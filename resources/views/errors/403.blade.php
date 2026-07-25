@extends('errors.layout')

@section('code', '403')
@section('title', 'Access Forbidden')
@section('message', 'You do not have permission to access this page. If you believe this is a mistake, please contact us.')

@section('icon')
    <svg class="h-11 w-11" fill="none" stroke="currentColor" stroke-width="1.3" viewBox="0 0 24 24" style="color: #d43a7b;">
        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z"/>
    </svg>
@endsection

@section('actions')
    <a href="/" style="display:inline-flex;align-items:center;gap:8px;background:#d43a7b;color:#fff;padding:12px 24px;border-radius:12px;font-size:14px;font-weight:600;text-decoration:none;transition:opacity .2s;" onmouseover="this.style.opacity='.85'" onmouseout="this.style.opacity='1'">
        <svg style="width:16px;height:16px;flex-shrink:0;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/></svg>
        Back to Home
    </a>
    <a href="javascript:history.back()" style="display:inline-flex;align-items:center;gap:8px;border:1px solid rgba(255,255,255,.2);color:rgba(255,255,255,.75);padding:12px 24px;border-radius:12px;font-size:14px;font-weight:600;text-decoration:none;transition:opacity .2s;" onmouseover="this.style.opacity='.7'" onmouseout="this.style.opacity='1'">
        <svg style="width:16px;height:16px;flex-shrink:0;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3"/></svg>
        Go Back
    </a>
@endsection
