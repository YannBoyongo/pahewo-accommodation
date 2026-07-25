@extends('errors.layout')

@section('code', '429')
@section('title', 'Too Many Requests')
@section('message', 'You have sent too many requests in a short period of time. Please wait a few minutes and try again.')

@section('icon')
    <svg class="h-11 w-11" fill="none" stroke="currentColor" stroke-width="1.3" viewBox="0 0 24 24" style="color: #d43a7b;">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z"/>
    </svg>
@endsection

@section('actions')
    <a href="/" style="display:inline-flex;align-items:center;gap:8px;background:#d43a7b;color:#fff;padding:12px 24px;border-radius:12px;font-size:14px;font-weight:600;text-decoration:none;transition:opacity .2s;" onmouseover="this.style.opacity='.85'" onmouseout="this.style.opacity='1'">
        <svg style="width:16px;height:16px;flex-shrink:0;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/></svg>
        Back to Home
    </a>
    <button onclick="location.reload()" style="display:inline-flex;align-items:center;gap:8px;border:1px solid rgba(255,255,255,.2);color:rgba(255,255,255,.75);padding:12px 24px;border-radius:12px;font-size:14px;font-weight:600;background:transparent;cursor:pointer;transition:opacity .2s;" onmouseover="this.style.opacity='.7'" onmouseout="this.style.opacity='1'">
        <svg style="width:16px;height:16px;flex-shrink:0;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99"/></svg>
        Try Again
    </button>
@endsection
