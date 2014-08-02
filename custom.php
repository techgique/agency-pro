// Mike Lyon hacks Brigette Callahan SKA Shotokan Karate hacks begin here - copy these lines when upgrading theme!

wp_enqueue_style('custom', 'https://raw.githubusercontent.com/ska-org/agency-pro/master/custom.css');

add_image_size( '100-page', 1040, 2000, FALSE ); // Mike lyon hack SKA Brigette

add_image_size( '050-page', 520,520, FALSE ); // Mike lyon hack SKA Brigette



//* Mike Lyon hack to fix default media witdh so youtube fills page

if ( ! isset( $content_width ) ) $content_width = 1045;

//* Mike Lyon hack to fix youtube and flash media so it doesn't overlay menus etc

function add_video_wmode_transparent($html, $url, $attr) {

if ( strpos( $html, "<embed src=" ) !== false )
   { return str_replace('</param><embed', '</param><param name="wmode" value="opaque"></param><embed wmode="opaque" ', $html); }
elseif ( strpos ( $html, 'feature=oembed' ) !== false )
   { return str_replace( 'feature=oembed', 'feature=oembed&wmode=opaque', $html ); }
else
   { return $html; }
}
add_filter( 'embed_oembed_html', 'add_video_wmode_transparent', 10, 3);

//* add back the site description which was removed above
add_action( 'genesis_site_description', 'genesis_seo_site_description' );

//* Remove comments Mike Lyon hack

remove_action( 'genesis_after_post', 'genesis_get_comments_template' );
remove_action( 'genesis_after_entry', 'genesis_get_comments_template' );

// end of Mike Lyon hacks

