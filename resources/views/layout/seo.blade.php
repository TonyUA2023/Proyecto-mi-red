@php
  $seoData = [
    '@context' => 'https://schema.org',
    '@type' => 'LocalBusiness',
    'name' => 'Mi Red - Huancayo',
    'image' => asset('images/og-mired.jpg'),
    'telephone' => '+51XXXXXXXXX',
    'address' => [
      '@type' => 'PostalAddress',
      'addressLocality' => 'Huancayo',
      'addressRegion' => 'Junín',
      'addressCountry' => 'PE',
    ],
    'url' => url('/'),
  ];
@endphp

<script type="application/ld+json">
@json($seoData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
</script>
