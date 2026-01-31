@extends('layout.app')

@php
$seo = [
  'title' => 'Política de Privacidad | Mi Red Huancayo',
  'description' => 'Conoce cómo Mi Red Huancayo recopila y protege tu información.',
];
@endphp

@section('content')
<section style="padding:48px 0">
  <div class="container" style="max-width:900px">
    <h1 style="font-size:36px;font-weight:900">Política de Privacidad</h1>
    <p style="color:var(--muted)">
      Última actualización: {{ now()->format('d/m/Y') }}
    </p>

    <div class="card" style="padding:22px">
      <h3>1. Datos que recopilamos</h3>
      <p style="color:rgba(255,255,255,.92);line-height:1.8">
        Podemos recopilar datos como nombre, teléfono, dirección y mensajes enviados a través de formularios
        o WhatsApp para atender solicitudes de servicio.
      </p>

      <h3>2. Uso de la información</h3>
      <p style="color:rgba(255,255,255,.92);line-height:1.8">
        Usamos la información para coordinar instalaciones, soporte técnico, atención al cliente y comunicaciones
        relacionadas al servicio.
      </p>

      <h3>3. Protección</h3>
      <p style="color:rgba(255,255,255,.92);line-height:1.8">
        Tomamos medidas razonables para proteger la información. Sin embargo, ningún sistema es 100% infalible.
      </p>

      <h3>4. Terceros</h3>
      <p style="color:rgba(255,255,255,.92);line-height:1.8">
        No vendemos tu información. Podríamos compartirla solo si es necesario para operar el servicio o por obligación legal.
      </p>

      <h3>5. Contacto</h3>
      <p style="color:rgba(255,255,255,.92);line-height:1.8">
        Si tienes dudas sobre esta política, contáctanos desde la sección de contacto.
      </p>
    </div>

    <div style="margin-top:16px">
      <a href="{{ route('web.contacto') }}" class="btn btn-primary">Contactar</a>
    </div>
  </div>
</section>
@endsection
