<?php 
    /* get categories */
        $taxo = 'category';
        $_category = array();
        if(!isset($atts['cat']) || $atts['cat']==''){
            $terms = get_terms($taxo);
            foreach ($terms as $cat){
                $_category[] = $cat->term_id;
            }
        } else {
            $_category  = explode(',', $atts['cat']);
        }
        $atts['categories'] = $_category;
        
        /* Extra params in Monaco Theme */
        $atts['element_title_layout']  = isset($atts['element_title_layout'] )? $atts['element_title_layout']  : '1';
        $element_title_layout = $atts['element_title_layout'];
        $atts['element_title']  = isset($atts['element_title'] )? $atts['element_title']  : '';
        $atts['element_sub_title']  = isset($atts['element_sub_title'] )? $atts['element_sub_title']  : '';
        $atts['element_title_desc']  = isset($atts['element_title_desc'] )? $atts['element_title_desc']  : ''; 
?>
<div class="cms-grid-wraper cms-grid-blog2 <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php if($atts['element_title'] !='' || $atts['element_sub_title'] !='' || $atts['element_title_desc'] !='') : ?>
        <header class="cms-element-header layout-<?php echo $element_title_layout;?>">
        <?php switch ($element_title_layout) {
                case '1':
            ?>
                <div class="cms-element-header-title">
                    <h1>
                        <?php 
                            $title = $atts['element_title'];
                            $pos = mb_strpos($title, ' ');
                            if ($pos != false) {
                                $title = '<span class="first-word">'.mb_substr($title, 0, $pos).'</span> '.mb_substr($title, $pos + 1);
                            } else {
                                $title = '<span class="first-word">'.$title.'</span>';
                            }

                            echo $title ;
                        ?>
                    </h1>
                </div>
                <div class="cms-element-subtitle playfairdisplay"><?php echo $atts['element_sub_title']; ?></div>
                <div class="cms-element-desc"><?php echo $atts['element_title_desc']; ?></div>
            <?php
                break;
                case '2' :
            ?>
                <div class="row">
                    <div class="cms-element-header-title col-xs-12 col-sm-4 col-md-4 col-lg-3">
                        <h1>
                            <?php 
                                $title = $atts['element_title'];
                                $pos = mb_strpos($title, ' ');
                                if ($pos != false) {
                                    $title = '<span class="first-word">'.mb_substr($title, 0, $pos).'</span> '.mb_substr($title, $pos + 1);
                                } else {
                                    $title = '<span class="first-word">'.$title.'</span>';
                                }

                                echo $title ;
                            ?>
                        </h1>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 nopaddingleft">
                        <div class="cms-element-subtitle playfairdisplay"><?php echo $atts['element_sub_title']; ?></div>
                        <div class="cms-element-desc"><?php echo $atts['element_title_desc']; ?></div>
                    </div>
                </div>
            <?php
                break;
                case '3' :
            ?>
                <div class="container">
                <div class="row">
                    <div class="cms-element-header-title col-xs-12 col-sm-4 col-md-4 col-lg-3">
                        <h1>
                            <?php 
                                $title = $atts['element_title'];
                                $pos = mb_strpos($title, ' ');
                                if ($pos != false) {
                                    $title = '<span class="first-word">'.mb_substr($title, 0, $pos).'</span> '.mb_substr($title, $pos + 1);
                                } else {
                                    $title = '<span class="first-word">'.$title.'</span>';
                                }

                                echo $title ;
                            ?>
                        </h1>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 nopaddingleft">
                        <div class="cms-element-subtitle playfairdisplay"><?php echo $atts['element_sub_title']; ?></div>
                        <div class="cms-element-desc"><?php echo $atts['element_title_desc']; ?></div>
                    </div>
                </div>
                </div>
            <?php
                break;
                default:
            ?>  
                <div class="cms-element-header-title">
                    <h1>
                        <?php 
                            $title = $atts['element_title'];
                            $pos = mb_strpos($title, ' ');
                            if ($pos != false) {
                                $title = '<span class="first-word">'.mb_substr($title, 0, $pos).'</span> '.mb_substr($title, $pos + 1);
                            } else {
                                $title = '<span class="first-word">'.$title.'</span>';
                            }

                            echo $title ;
                        ?>
                    </h1>
                </div>
                <div class="cms-element-subtitle playfairdisplay"><?php echo $atts['element_sub_title']; ?></div>
                <div class="cms-element-desc"><?php echo $atts['element_title_desc']; ?></div>
            <?php
                break;
            }
        ?>
        </header>
    <?php endif; ?>
    <?php if($atts['filter']=="true" and $atts['layout']=='masonry'):?>
        <div class="cms-grid-filter">
            <ul class="cms-filter-category cms-meta list-unstyled list-inline">
                <li><a class="active" href="#" data-group="all">All</a></li>
                <?php foreach($atts['categories'] as $category):?>
                    <?php $term = get_term( $category, $taxo );?>
                    <li><a href="#" data-group="<?php echo esc_attr('category-'.$term->slug);?>">
                            <?php echo esc_html($term->name);?>
                        </a>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
    <?php endif;?>
    <div class="row <?php echo esc_attr($atts['grid_class']);?>">
        <?php
        $posts = $atts['posts'];
        $size = ($atts['layout']=='basic')?'blog-grid':'blog-masonry';
        $index = 0;
        $number = '';
        while($posts->have_posts()){
            $index ++; 
            if($index<=9) $number = '0'.$index.'.';
            else $number = $index.'.';

            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            foreach(cmsGetCategoriesByPostID(get_the_ID(),$taxo) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }

            /* Add special style for first word in title */
            $title = explode(' ', get_the_title());
            $title_part1 = '<span>'.array_shift($title).'</span>';
            $title_part2 = join(' ', $title);
            ?>
            <div class="cms-grid-item text-center <?php echo esc_attr($atts['item_class']);?> overlay-wrap" data-groups='[<?php echo implode(',', $groups);?>]'>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 <?php if($index%2 == 1) echo 'pull-right' ?>">
                    <?php 
                        if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false)):
                            $class = ' has-thumbnail';
                            $thumbnail = get_the_post_thumbnail(get_the_ID(),$size);
                            $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
                            $image_url = $image[0];
                        else:
                            $class = ' no-image';
                            $thumbnail = '<img src="'.CMS_IMAGES.'no-image.jpg" alt="'.get_the_title().'" />';
                            $image_url = CMS_IMAGES.'no-image.jpg';
                        endif;
                        /*$overlay_content = '<span class="cms-number"><span class="cms-number-inner">'.$number.'</span></span><div class="overlay"><div class="overlay-content"><a class="icon circle" href="'.get_the_permalink().'"><i class="fa fa-link"></i></a><a class="icon circle prettyphoto"  href="'.$image_url.'"><i class="fa fa-search"></i></a></div></div>'; */
                        $overlay_content = '<span class="cms-number"><span class="cms-number-inner">'.$number.'</span></span>';
                        echo '<div class="cms-grid-media'.esc_attr($class).'">'.$thumbnail.$overlay_content.'</div>';
                    ?>
                    </div>
                    <div class="cms-vertical-align col-xs-12 col-sm-6 col-md-6 col-lg-6 <?php if($index%2 != 1) echo 'position-right' ?>">
                        <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
                            <h1 class="cms-grid-title">
                                <a href="<?php the_permalink();?>"><?php echo $title_part1.''.$title_part2;?></a>
                            </h1>
                            <div class="cms-grid-content">
                                <?php echo cms_limit_words(get_the_excerpt(),32); ?>
                            </div>
                            <div class="cms-grid-link">
                                <a class="more-link" title="<?php echo get_the_title();?>" href="<?php the_permalink();?>"><?php echo __('Read more &rarr;', 'zk-monaco' );?></a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <?php 
        wp_reset_postdata();
    ?>
</div>