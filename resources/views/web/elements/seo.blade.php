<?php
$domain = getenv('APP_URL');
?>
<title>{{ $title }}</title>

<meta name='description' content='{{ !empty($description) ? $description : '' }}'/>
<meta name='keywords' content='{{ !empty($keyword) ? $keyword : '' }}'/>
<meta name='robots' content='index, follow'/>
<meta name='googlebot' content='index, follow'/>

<meta name="copyright" content="&amp;copy; {{ $domain }}"/>
<meta name="geo.region" content="VN-HN"/>
<meta name="geo.placename" content="Hà Nội"/>
<meta name="geo.position" content="21.014695;105.798596"/>
<meta name="ICBM" content="21.014695, 105.798596"/>

<!-- Facebook Open Graph Meta Tags -->
<meta property="fb:app_id" content="1223640827780531"/>
<meta property="og:locale" content="vi_VN"/>
<meta property="og:type" content="website"/>
<meta property="og:url" content="http://{{ $domain }}"/>
<meta property="og:site_name" content="{{ $domain }}"/>
<meta property="og:rich_attachment" content="true"/>
<meta property='og:title' content='{{ !empty($title) ? $title : '' }}'/>
<meta property='og:description' content='{{ !empty($description) ? $description : '' }}'/>
<meta property='og:image' content='{{ !empty($image) ? $image : '' }}'/>
<meta property="og:image:type" content="image/jpeg"/>
<meta property="og:image:width" content="720"/>
<meta property="og:image:height" content="378"/>
<!-- Twittercard -->

<meta name="twitter:card" content="summary"/>
<meta name='twitter:title' content='{{ !empty($title) ? $title : '' }}'/>
<meta name='twitter:description' content='{{ !empty($description) ? $description : '' }}'/>
<meta name="twitter:domain" content="http://{{ $domain }}/"/>

<meta name="twitter:creator" content="{{ '@'.$domain }}"/>
<meta name="twitter:site" content="{{ '@'.$domain }}"/>
<!-- Microdata -->

<!-- PWA -->
<meta name="theme-color" content="#e5c8a2">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="#fff">
<meta name="apple-mobile-web-app-title" content="{{ $domain }}">
<link rel="apple-touch-icon" href="http://{{ $domain }}/upload/images/icon-152x152.png">
<meta name="msapplication-TileImage" content="http://{{ $domain }}/upload/images/icon-144x144.png">
<meta name="msapplication-TileColor" content="#fff">
<link rel="manifest" href="http://{{ $domain }}/js/pwa/manifest.json"/>
<script type="application/ld+json">
{"@context":"http://schema.org","@type":"WebSite","name":"{{ $domain }}","alternateName":"{{ $domain }}","url":"http://{{ $domain }}","potentialAction":[{"@type":"SearchAction","target":"http://{{ $domain }}/search?destination={search_term_string}","query-input":"required name=search_term_string"}]}


</script>
<script type="application/ld+json">
{"@context":"http://schema.org","@type":"Organization","url":"http://{{ $domain }}","logo":"http://{{ $domain }}/images/logo.png","contactPoint":[{"@type":"ContactPoint","telephone":"+84911883399","contactType":"customer service"}]}

</script>
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "TravelAgency",
  "name": "{{ $domain }}",
  "image": "http://{{ $domain }}/images/logo.png",
  "@id": "",
  "url": "http://{{ $domain }}/",
  "telephone": "{{ \App\Libs\WebLib::getSetting(\App\Models\Setting::HOT_LINE_NUMBER) }}",
  "priceRange": "0",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "{{ \App\Libs\WebLib::getSetting(\App\Models\Setting::ADDRESS) }}",
    "addressLocality": "Hà Nội",
    "postalCode": "100000",
    "addressCountry": "VN"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": 10.767679,
    "longitude": 106.694076
  },
  "openingHoursSpecification": [{
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": "Monday",
    "opens": "07:00",
    "closes": "17:00"
  },{
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": "Tuesday",
    "opens": "07:00",
    "closes": "17:00"
  },{
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": "Wednesday",
    "opens": "07:00",
    "closes": "17:00"
  },{
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": "Thursday",
    "opens": "07:00",
    "closes": "17:00"
  },{
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": "Friday",
    "opens": "07:00",
    "closes": "17:00"
  },{
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": "Saturday",
    "opens": "07:00",
    "closes": "12:00"
  }],
  "sameAs": [
    "http://www.facebook.com/{{ $domain }}/",
    "http://twitter.com/{{ $domain }}",
    "http://www.instagram.com/{{ $domain }}/",
    "http://www.youtube.com/channel/UCtIvGyRqxdtRiJM8ETq4CBA",
    "http://www.linkedin.com/company/{{ $domain }}"
  ]
}





</script>