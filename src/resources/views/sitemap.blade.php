<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  @foreach($pages as $page)
   <url>
      <loc>{{ url($page->slug) }}</loc>
      <lastmod>{{ (new Carbon\Carbon($page->updated_at))->format("Y-m-d") }}</lastmod>
   </url>
  @endforeach
  @foreach($units as $unit)
   <url>
      <loc>{{ url("units/" . $unit->shortname) }}</loc>
      <changefreq>weekly</changefreq>
   </url>
  @endforeach
</urlset>
