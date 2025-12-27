<style>
    @page { margin: 0; }
    *{
        font-family: Arial, Helvetica, sans-serif
    }
</style>
{{-- @for ($i = 0; $i < 2; $i++)
@endfor --}}
<img src="{{ asset('backend/etiket/etiketplesiran.jpg') }}"
style="
width: 15.5cm;
height: 5.34cm;
position: absolute;
">
<div style="
    position: absolute;
    color: rgb(255, 186, 2);
    right: 20%;
    top: 5%
">#xxxxxxxx-xx</div>
<div style="
    position: absolute;
    color: rgb(255, 186, 2);
    right: 20%;
    bottom: 5%
">{{ \Carbon\Carbon::now()->format('Y-m-d') }}</div>
