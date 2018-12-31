<?php
/**
 * @name : Default
 * @package : CMSSuperHeroes
 * @author : Fox
 */
global $woocommerce;
?>
<?php global $smof_data, $cms_meta; ?>
    <div id="cms-header" class="cms-header <?php cms_header_class();?>">
    <div id="cms-header-inner">
        <div id="cms-header-logo">
            <a href="<?php echo home_url(); ?>"><img alt="" src="<?php echo esc_url($smof_data['main_logo']['url']); ?>"></a>
        </div>
        <div id="cms-header-navigation">
            <nav id="site-navigation" class="main-navigation" role="navigation">
                <?php
                
                $attr = array(
                    'menu' =>cms_menu_location(),
                    'menu_class' => 'nav-menu menu-main-menu',
                );
                
                $menu_locations = get_nav_menu_locations();
                
                if(!empty($menu_locations['primary'])){
                    $attr['theme_location'] = 'primary';
                }
                
                /* enable mega menu. */
                if(class_exists('HeroMenuWalker')){ $attr['walker'] = new HeroMenuWalker(); }
                
                /* main nav. */
                wp_nav_menu( $attr ); ?>

            </nav>
        </div>
        <div id="cms-nav-extra" class="cms-nav-extra main-navigation">
            <?php if (is_page_template('page-templates/portfolio-masonry.php')) {?>
            <div class="pull-left hidden-xs hidden-sm">
                <ul id="cms-portfolio-masonry-sort">
                    <li><span><?php echo __('Display', 'zk-monaco' );?></span></li>
                    <li><a id="columns2" class="change-columns active"><i class="fa fa-th-large"></i></a>
                    <li><a id="columns3" class="change-columns"><i class="fa fa-th"></i></a></li>
                </ul>
            </div>
            <?php } ?>
            <?php if($smof_data['header_widget']){?>
                <?php if($woocommerce && $smof_data['header_widget_cart'] && is_active_sidebar('sidebar-8')) { ?>
                <div class="pull-left">
                    <?php dynamic_sidebar('sidebar-8'); ?>                           
                </div>
                <?php } ?>
                <?php if($smof_data['header_widget_search']){?>
                <div class="pull-left">
                    <ul>
                        <li>
                            <a id="header-widget-search"><i class="fa fa-search"></i></a>
                        </li>
                    </ul>
                </div>
                <?php } ?>
            <?php } ?>
            <div id="cms-menu-mobile" class="pull-left"><ul><li><a><i class="fa fa-bars"></i></a></li></ul></div>
        </div>
    </div>
</div>
<!-- #site-navigation -->