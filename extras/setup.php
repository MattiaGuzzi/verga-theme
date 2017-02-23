<?php
add_filter('query_vars', function ($vars) {
    $vars[] = "ppp";
    return $vars;
});

add_action('pre_get_posts', function (\WP_Query $q) {
    if (!is_admin() && $q->is_main_query()) {
        $ppp = $q->get('ppp');
        if (!empty($ppp) && 20 >= (int)$ppp)
            $q->set('posts_per_page', (int)$ppp);
    }
});