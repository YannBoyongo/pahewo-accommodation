@extends('errors.layout')

@section('code', '419')
@section('title', 'Session Expired')
@section('message', 'Your session has timed out or the security token is no longer valid. Go back and submit the form again — it only takes a second.')

@section('icon')
    <svg class="h-11 w-11" fill="none" stroke="currentColor" stroke-width="1.3" viewBox="0 0 24 24" style="color: #d43a7b;">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
    </svg>
@endsection

@section('actions')
    <a href="javascript:history.back()" style="display:inline-flex;align-items:center;gap:8px;background:#d43a7b;color:#fff;padding:12px 24px;border-radius:12px;font-size:14px;font-weight:600;text-decoration:none;transition:opacity .2s;" onmouseover="this.style.opacity='.85'" onmouseout="this.style.opacity='1'">
        <svg style="width:16px;height:16px;flex-shrink:0;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3"/></svg>
        Go Back &amp; Retry
    </a>
    <a href="/" style="display:inline-flex;align-items:center;gap:8px;border:1px solid rgba(255,255,255,.2);color:rgba(255,255,255,.75);padding:12px 24px;border-radius:12px;font-size:14px;font-weight:600;text-decoration:none;transition:opacity .2s;" onmouseover="this.style.opacity='.7'" onmouseout="this.style.opacity='1'">
        <svg style="width:16px;height:16px;flex-shrink:0;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/></svg>
        Back to Home
    </a>
@endsection
