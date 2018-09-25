<?php

get_header();

// Your search query
global $query_string;

$query_args = explode("&", $query_string);
$category_query = isset($_GET['category']) ? $_GET['category'] : "";
$date_filter = isset($_GET['date']) ? $_GET['date'] : "";

$paged = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
$posts_per_page = 8;

// Set the taxonomy which contains the different categories/terms
$available_categories = get_terms('tax_name');

// Format search query to be fitted within the Wp query arguments
$search_query = [];
if (strlen($query_string) > 0) {
    foreach ($query_args as $key => $string) {
        $query_split = explode("=", $string);
        $search_query[$query_split[0]] = urldecode($query_split[1]);
    }
}
$search_query_s = isset($search_query['s']) ? $search_query['s'] : '';

// Set the query arguments and get the posts that you request
// For a complete overview of all the possible arguments check: https://www.billerickson.net/code/wp_query-arguments/
$search = new WP_Query([
    's' => $search_query_s,
    'post_status' => 'publish',
    'orderby' => 'post_date',
    'order' => $date_filter === 'old' ? 'ASC' : 'DESC',
    'posts_per_page' => $posts_per_page,
    'paged' => $paged,
    // Optional - filter query by taxonomy term, its left empty when no requested terms exist within the taxonomy
    'tax_query' => $category_query ? [
        'relation' => 'OR',
        [
            'taxonomy' => 'tax_name',
            'field' => 'slug',
            'terms' => $category_query,
        ]
     ] : '',
]);
$label = $search->found_posts == 1 ? 'zoekresultaat' : 'zoekresultaten';
?>
    <div class="container type-single page-search page">
        <div class="row">
            <div class="post-preview-container">
                <h2><?= $search->found_posts ?> <?= $label ?> </h2>
                <strong>Filter resultaten</strong>
                <form class="search-filter" action="" method="get">
                    <input name="s" type="hidden" value="<?= $search_query_s ?>">

                    <?php
                    // Check if categories are available and if posts are assigned to it
                    if ($available_categories && !isset($available_categories->errors)) : ?>
                        <label class="is-label">
                            <select name="category">
                                <option value="">Categorie</option>
                                <?php foreach ($available_categories as $term) : ?>
                                    <option <?= $term->slug === $category_query ? 'selected' : '' ?>
                                            value="<?= $term->slug ?>"><?= $term->name ?></option>
                                <?php endforeach ?>
                            </select>
                        </label>
                    <?php endif ?>

                    <label class="is-label">
                        <select name="date" data-url="<?= $current_url ?>">
                            <option value="">Datum</option>
                            <option <?= $date_filter === 'new' ? 'selected' : '' ?> value="new">Nieuwste</option>
                            <option <?= $date_filter === 'old' ? 'selected' : '' ?> value="old">Oudste</option>
                        </select>
                    </label>
                    <input type="submit" value="Toepassen">
                </form>

                <div class="search-result-container">

                    <!-- Pagination -->
                    <div class="result-nav">
                        <strong>Resultaten</strong>
                        <?php if ($search->found_posts) : ?>
                            <div class="pagination-navigation">
                                <div class="pagination-text">
                                    Pagina <?= $paged ?> van <?= $search->max_num_pages ?>
                                </div>
                                <?php if ((int)$paged > 1) : ?>
                                    <a href="<?= add_query_arg('pagina', $paged - 1, $_SERVER['REQUEST_URI']) ?>"
                                       class="nav-arrow type-prev"></a>
                                <?php endif ?>
                                <?php if ((int)$paged !== (int)$search->max_num_pages) : ?>
                                    <a href="<?= add_query_arg('pagina', $paged + 1, $_SERVER['REQUEST_URI']) ?>"
                                       class="nav-arrow type-next"></a>
                                <?php endif ?>
                            </div>
                        <?php endif ?>
                    </div>

                    <!-- Loop through the search results and display them -->
                    <div class="search-result-container">
                        <?php if ($search->have_posts()) : ?>
                            <!-- the loop -->
                            <?php while ($search->have_posts()) :?>
                                <?php $search->the_post() ?>
                                <a href="<?= get_permalink() ?>" class="search-preview-item-container">
                                <?php
                                if (get_the_post_thumbnail()) {
                                    $thumbUrl =get_the_post_thumbnail_url();
                                } else {
                                    $thumbUrl = get_template_directory_uri() . '/_assets/img/news-placeholder.jpg';
                                }
                                ?>                                    
                                    <div class="search-thumb" style="background-image:url(<?= $thumbUrl  ?>)"></div>

                                    <div class="search-meta">
                                        <h3><?php the_title() ?></h3>
                                        <?php the_excerpt() ?>
                                        <span class="read-more">
                                            lees verder
                                        </span>
                                    </div>
                                </a>

                            <?php endwhile ?>
                            <?php
                            // This one is important! You must always reset your WP query when finishing the loop
                            // WP logic :')
                            wp_reset_query();
                            ?>
                        <?php else : ?>
                            <div class="no-results">
                                Er zijn geen resultaten gevonden voor deze zoekopdracht!
                            </div>
                        <?php endif ?>
                    </div>

                    <!-- Pagination repeat on bottom page -->
                    <div class="result-nav">
                        <?php if ($search->found_posts) : ?>
                            <div class="pagination-navigation">
                                <div class="pagination-text">
                                    Pagina <?= $paged ?> van <?= $search->max_num_pages ?>
                                </div>
                                <?php if ((int)$paged > 1) : ?>
                                    <a href="<?= add_query_arg('pagina', $paged - 1, $_SERVER['REQUEST_URI']) ?>"
                                       class="nav-arrow type-prev"></a>
                                <?php endif ?>
                                <?php if ((int)$paged !== (int)$search->max_num_pages) : ?>
                                    <a href="<?= add_query_arg('pagina', $paged + 1, $_SERVER['REQUEST_URI']) ?>"
                                       class="nav-arrow type-next"></a>
                                <?php endif ?>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();
