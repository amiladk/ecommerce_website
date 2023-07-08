<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

  <url>
    <loc>https://www.aryanselectronics.com/</loc>
    <lastmod>2021-12-22T04:16:40+00:00</lastmod>
    <priority>1.00</priority>
  </url>

  <url>
    <loc>https://www.aryanselectronics.com/contact-us</loc>
    <lastmod>2021-12-22T04:16:40+00:00</lastmod>
    <priority>0.80</priority>
  </url>

  <url>
    <loc>https://www.aryanselectronics.com/shop</loc>
    <lastmod>2021-12-22T04:16:40+00:00</lastmod>
    <priority>0.80</priority>
  </url>

  <url>
    <loc>https://www.aryanselectronics.com/cart</loc>
    <lastmod>2021-12-22T04:16:40+00:00</lastmod>
    <priority>0.80</priority>
  </url>

  <url>
    <loc>https://www.aryanselectronics.com/checkout</loc>
    <lastmod>2021-12-22T04:16:40+00:00</lastmod>
    <priority>0.80</priority>
  </url>

  <url>
    <loc>https://www.aryanselectronics.com/about-us</loc>
    <lastmod>2021-12-22T04:16:40+00:00</lastmod>
    <priority>0.80</priority>
  </url>

  <url>
    <loc>https://www.aryanselectronics.com/faq</loc>
    <lastmod>2021-12-22T04:16:40+00:00</lastmod>
    <priority>0.80</priority>
  </url>

  <url>
    <loc>https://www.aryanselectronics.com/signup</loc>
    <lastmod>2021-12-22T04:16:40+00:00</lastmod>
    <priority>0.80</priority>
  </url>

  <url>
    <loc>https://www.aryanselectronics.com/forget-password</loc>
    <lastmod>2021-12-22T04:16:40+00:00</lastmod>
    <priority>0.64</priority>
  </url>

  <url>
    <loc>https://www.aryanselectronics.com/404</loc>
    <lastmod>2021-12-22T04:16:40+00:00</lastmod>
    <priority>0.64</priority>
  </url>


  @foreach($data['site_map_product'] as $url => $params )
      <url>
          <loc>https://www.aryanselectronics.com/product/{{$params['loc']}}</loc>
          <lastmod>{{$params['lastmod']}}</lastmod>
          <changefreq>{{$params['changefreq']}}</changefreq>
          <priority>{{$params['priority']}}</priority>

          @foreach($params['images'] as $url_1 => $params_1 )
              <image:image>
                  <image:loc>https://www.webstoresl.com/sellercenter/assets/images/{{$params_1['image']}}</image:loc>
                  <image:title>{{$params_1['title']}}</image:title>
              </image:image>

          @endforeach

      </url>
  @endforeach

</urlset>