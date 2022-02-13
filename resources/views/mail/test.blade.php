@component('mail::message')
<h1 style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';color:#3d4852;font-size:18px;font-weight:bold;margin-top:0;text-align:left">Hello!</h1>

<h3 style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';color:#3d4852;font-size:14px;font-weight:bold;margin-top:0;text-align:left">Welcome to Ghaslat</h3>

@if( $headContent)
<p>{{ $headContent }}</p>
@endif

@if( $body)
<p>{{ $body }}</p>
@endif

<hr />
@if( $footerContent)
<p>{{ $footerContent}}</p>
@endif

@endcomponent
