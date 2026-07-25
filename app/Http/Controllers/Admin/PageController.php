<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Support\HandlesUploadedMedia;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class PageController extends Controller
{
    public function index(): View
    {
        return view('admin.pages.index', [
            'pages' => collect(config('content-pages'))
                ->map(fn (array $definition, string $slug): Page => Page::managed($slug)),
        ]);
    }

    public function edit(string $page): View
    {
        abort_unless(config()->has('content-pages.'.$page), 404);

        return view('admin.pages.edit', [
            'page' => Page::managed($page),
            'definition' => config('content-pages.'.$page),
        ]);
    }

    public function update(Request $request, string $page): RedirectResponse
    {
        abort_unless(config()->has('content-pages.'.$page), 404);

        $definition = config('content-pages.'.$page);
        $sections = collect($definition['fields'])->pluck('section')->unique()->values()->all();
        $sectionValidator = Validator::make($request->all(), [
            'section' => ['nullable', 'string', Rule::in($sections)],
        ]);

        if ($sectionValidator->fails()) {
            throw (new ValidationException($sectionValidator))
                ->redirectTo(route('dashboard.pages.edit', $page));
        }

        $section = $sectionValidator->validated()['section'] ?? null;
        $fields = $section
            ? collect($definition['fields'])
                ->filter(fn (array $field): bool => $field['section'] === $section)
                ->all()
            : $definition['fields'];
        $rules = [];

        foreach ($fields as $key => $field) {
            if ($field['type'] === 'image') {
                $rules = [
                    ...$rules,
                    ...HandlesUploadedMedia::singleImageRules($key),
                    'remove_'.$key => ['sometimes', 'boolean'],
                ];

                continue;
            }

            $rules[$key] = [
                ($field['required'] ?? true) ? 'required' : 'nullable',
                'string',
                'max:'.($field['max'] ?? ($field['type'] === 'textarea' ? 10000 : 255)),
            ];
        }

        $attributes = collect($fields)
            ->mapWithKeys(fn (array $field, string $key): array => [$key => $field['label']])
            ->all();
        $validator = Validator::make($request->all(), $rules, [], $attributes);

        if ($validator->fails()) {
            $redirectUrl = route('dashboard.pages.edit', $page)
                .($section ? '#'.Str::slug($section) : '');

            throw (new ValidationException($validator))->redirectTo($redirectUrl);
        }

        $validated = $validator->validated();
        $pageModel = Page::managed($page);
        $content = $pageModel->content ?? [];

        foreach ($fields as $key => $field) {
            if ($field['type'] === 'image') {
                HandlesUploadedMedia::syncSingleImage($pageModel, $request, $key, $key, 'remove_'.$key);

                continue;
            }

            $content[$key] = $validated[$key] ?? null;
        }

        $pageModel->update([
            'name' => $definition['name'],
            'content' => $content,
        ]);

        $message = $section
            ? $section.' section updated successfully.'
            : $definition['name'].' updated successfully.';

        $redirectUrl = route('dashboard.pages.edit', $page)
            .($section ? '#'.Str::slug($section) : '');

        return redirect()
            ->to($redirectUrl)
            ->with('success', $message)
            ->with('updated_section', $section);
    }
}
