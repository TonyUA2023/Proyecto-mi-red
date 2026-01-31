@extends('layout.app')

@php
$seo = [
  'title' => 'Términos y Condiciones | Mi Red Huancayo',
  'description' => 'Términos y condiciones del servicio de internet Mi Red Huancayo.',
];
@endphp

@section('content')
<section style="padding:48px 0">
  <div class="container" style="max-width:900px">
    <h1 style="font-size:36px;font-weight:900">Términos y Condiciones</h1>
    <p style="color:var(--muted)">
      Última actualización: {{ now()->format('d/m/Y') }}
    </p>

    <div class="card" style="padding:22px">
      <h3>1. Alcance del servicio</h3>
      <p style="color:rgba(255,255,255,.92);line-height:1.8">
        Mi Red Huancayo brinda servicio de internet según disponibilidad técnica y cobertura.
        Las velocidades ofrecidas corresponden al plan contratado y pueden variar por factores externos
        (equipos del usuario, interferencias, congestión local, etc.).
      </p>

      <h3>2. Instalación</h3>
      <p style="color:rgba(255,255,255,.92);line-height:1.8">
        La instalación se agenda previa coordinación. El cliente debe facilitar el acceso al lugar de instalación.
      </p>

      <h3>3. Pagos y facturación</h3>
      <p style="color:rgba(255,255,255,.92);line-height:1.8">
        Los pagos se realizan según el ciclo acordado. El retraso puede generar suspensión temporal del servicio.
      </p>

      <h3>4. Uso aceptable</h3>
      <p style="color:rgba(255,255,255,.92);line-height:1.8">
        El usuario se compromete a no utilizar el servicio para actividades ilegales o que afecten la red.
      </p>

      <h3>5. Soporte</h3>
      <p style="color:rgba(255,255,255,.92);line-height:1.8">
        El soporte se brinda por canales oficiales. Los tiempos de atención pueden variar según el caso.
      </p>

      <h3>6. Cambios</h3>
      <p style="color:rgba(255,255,255,.92);line-height:1.8">
        Estos términos pueden actualizarse. Recomendamos revisarlos periódicamente.
      </p>
    </div>

    <div style="margin-top:16px">
      <a href="{{ route('web.contacto') }}" class="btn btn-primary">Contactar</a>
    </div>
  </div>
</section>
@endsection
