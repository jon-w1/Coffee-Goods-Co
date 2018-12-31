<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */
global $smof_data;
$footer_bottom_layout = $smof_data['footer_bottom_layout'];
?>
        </div><!-- #main -->
        </section> <!-- #cms-content-wrapper -->
        <footer id="footer-wrapper" class="footer-bottom-layout-<?php echo $footer_bottom_layout;?>">
        <div class="footer-wrapper-inner">
            <?php if($smof_data['footer_icon'] && $footer_bottom_layout == '13') : ?>
                <div id="cms-footer-bottom" class="layout-1 layout-<?php echo $footer_bottom_layout;?>">
                    <div class="row">
                        <div class="footer-social footer-bottom-3 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <?php if(is_active_sidebar('sidebar-7')) {?>
                                <?php dynamic_sidebar('sidebar-7'); ?>
                            <?php } else { ?>
                                <div class="cms-social-sc">
                                    <?php if($smof_data['footer_icon1']) { ?><a href="<?php echo esc_url($smof_data['footer_icon1_url']);?>" class="fa fa-<?php echo esc_attr($smof_data['footer_icon1']);?>" title="<?php echo esc_attr($smof_data['footer_icon1_title']);?>"></a><?php } ?>
                                    <?php if($smof_data['footer_icon2']) { ?><a href="<?php echo esc_url($smof_data['footer_icon2_url']);?>" class="fa fa-<?php echo esc_attr($smof_data['footer_icon2']);?>" title="<?php echo esc_attr($smof_data['footer_icon2_title']);?>"></a><?php } ?>
                                    <?php if($smof_data['footer_icon3']) { ?><a href="<?php echo esc_url($smof_data['footer_icon3_url']);?>" class="fa fa-<?php echo esc_attr($smof_data['footer_icon3']);?>" title="<?php echo esc_attr($smof_data['footer_icon3_title']);?>"></a><?php } ?>
                                    <?php if($smof_data['footer_icon4']) { ?><a href="<?php echo esc_url($smof_data['footer_icon4_url']);?>" class="fa fa-<?php echo esc_attr($smof_data['footer_icon4']);?>" title="<?php echo esc_attr($smof_data['footer_icon4_title']);?>"></a><?php } ?>
                                </div>   
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($smof_data['enable_footer_top'] =='1' && (is_active_sidebar('sidebar-2') || is_active_sidebar('sidebar-3') || is_active_sidebar('sidebar-4'))): ?>
                <div id="cms-footer-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 col-md-6 col-lg-6"><?php dynamic_sidebar('sidebar-2'); ?></div>
                            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3"><?php dynamic_sidebar('sidebar-3'); ?></div>
                            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3"><?php dynamic_sidebar('sidebar-4'); ?></div>
                        </div>
                    </div>
                </div>
            <?php endif;?>
            <?php if(is_active_sidebar('sidebar-5') || is_active_sidebar('sidebar-6') || is_active_sidebar('sidebar-7') || esc_attr($smof_data['footer_address']) || $smof_data['footer_copyright'] || $smof_data['footer_icon']){?>
                <?php 
                    switch ($footer_bottom_layout) {
                    case '1':
                ?>
                    <div id="cms-footer-bottom" class="layout-<?php echo $footer_bottom_layout;?>">
                        <div class="footer-social footer-bottom-3">
                            <div class="container">
                            <?php if(is_active_sidebar('sidebar-7')) {?>
                                <?php dynamic_sidebar('sidebar-7'); ?>
                            <?php } else { ?>
                                <div class="cms-social-sc">
                                    <?php if($smof_data['footer_icon1']) { ?><a href="<?php echo esc_url($smof_data['footer_icon1_url']);?>" class="fa fa-<?php echo esc_attr($smof_data['footer_icon1']);?>" title="<?php echo esc_attr($smof_data['footer_icon1_title']);?>"></a><?php } ?>
                                    <?php if($smof_data['footer_icon2']) { ?><a href="<?php echo esc_url($smof_data['footer_icon2_url']);?>" class="fa fa-<?php echo esc_attr($smof_data['footer_icon2']);?>" title="<?php echo esc_attr($smof_data['footer_icon2_title']);?>"></a><?php } ?>
                                    <?php if($smof_data['footer_icon3']) { ?><a href="<?php echo esc_url($smof_data['footer_icon3_url']);?>" class="fa fa-<?php echo esc_attr($smof_data['footer_icon3']);?>" title="<?php echo esc_attr($smof_data['footer_icon3_title']);?>"></a><?php } ?>
                                    <?php if($smof_data['footer_icon4']) { ?><a href="<?php echo esc_url($smof_data['footer_icon4_url']);?>" class="fa fa-<?php echo esc_attr($smof_data['footer_icon4']);?>" title="<?php echo esc_attr($smof_data['footer_icon4_title']);?>"></a><?php } ?>
                                </div>   
                            <?php } ?>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="footer-address footer-bottom-1 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <?php if(is_active_sidebar('sidebar-5')) {?>
                                        <?php dynamic_sidebar('sidebar-5'); ?>
                                    <?php } elseif($smof_data['footer_address']!='') { ?>
                                        <div class="cms-address">
                                            <?php echo apply_filters('the_content',$smof_data['footer_address']);?>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="footer-copyright  footer-bottom-2 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <?php if(is_active_sidebar('sidebar-6')) {?>
                                        <?php dynamic_sidebar('sidebar-6'); ?>
                                    <?php } elseif($smof_data['footer_copyright']!='') { ?>
                                        <div class="cms-copyright">
                                            <?php echo apply_filters('the_content',$smof_data['footer_copyright']);?>
                                        </div>   
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>    
                <?php 
                    break;
                    case '2':
                ?>
                    <div id="cms-footer-bottom" class="layout-<?php echo $footer_bottom_layout;?>">
                        <div class="container">
                             <div class="row">
                                <div class="footer-address footer-bottom-1 col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <?php if(is_active_sidebar('sidebar-5')) {?>
                                        <?php dynamic_sidebar('sidebar-5'); ?>
                                    <?php } elseif(esc_attr($smof_data['footer_address'])!='') { ?>
                                        <div class="cms-address">
                                            <?php echo apply_filters('the_content',$smof_data['footer_address']);?>
                                        </div>
                                    <?php } ?>
                                    <div class="footer-copyright  footer-bottom-2">
                                        <?php if(is_active_sidebar('sidebar-6')) {?>
                                            <?php dynamic_sidebar('sidebar-6'); ?>
                                        <?php } elseif($smof_data['footer_copyright']!='') { ?>
                                            <div class="cms-copyright">
                                                <?php echo apply_filters('the_content',$smof_data['footer_copyright']);?>
                                            </div>   
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="footer-social footer-bottom-3 col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <?php if(is_active_sidebar('sidebar-7')) {?>
                                        <?php dynamic_sidebar('sidebar-7'); ?>
                                    <?php } else { ?>
                                        <div class="cms-social">
                                            <?php if($smof_data['footer_icon1_title']){ ?><a href="<?php echo esc_attr($smof_data['footer_icon1']);?>"><?php echo esc_attr($smof_data['footer_icon1_title']);?></a><?php } ?>
                                            <?php if($smof_data['footer_icon2_title']){ ?><a href="<?php echo esc_attr($smof_data['footer_icon2']);?>"><?php echo esc_attr($smof_data['footer_icon2_title']);?></a><?php } ?>
                                            <?php if($smof_data['footer_icon3_title']){ ?><a href="<?php echo esc_attr($smof_data['footer_icon3']);?>"><?php echo esc_attr($smof_data['footer_icon3_title']);?></a><?php } ?>
                                            <?php if($smof_data['footer_icon4_title']){ ?><a href="<?php echo esc_attr($smof_data['footer_icon4']);?>"><?php echo esc_attr($smof_data['footer_icon4_title']);?></a><?php } ?>
                                        </div>   
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>   
                <?php 
                    break;
                    case '3':
                ?>
                    <div id="cms-footer-bottom" class="layout-<?php echo $footer_bottom_layout;?>">
                        <div class="container">
                             <div class="row">
                                
                                <div class="footer-social footer-bottom-3 col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <?php if(is_active_sidebar('sidebar-7')) {?>
                                        <?php dynamic_sidebar('sidebar-7'); ?>
                                    <?php } else { ?>
                                        <div class="cms-social">
                                            <?php if($smof_data['footer_icon1']) { ?><a href="<?php echo esc_url($smof_data['footer_icon1_url']);?>" class="fa fa-<?php echo esc_attr($smof_data['footer_icon1']);?>" title="<?php echo esc_attr($smof_data['footer_icon1_title']);?>"></a><?php } ?>
                                            <?php if($smof_data['footer_icon2']) { ?><a href="<?php echo esc_url($smof_data['footer_icon2_url']);?>" class="fa fa-<?php echo esc_attr($smof_data['footer_icon2']);?>" title="<?php echo esc_attr($smof_data['footer_icon2_title']);?>"></a><?php } ?>
                                            <?php if($smof_data['footer_icon3']) { ?><a href="<?php echo esc_url($smof_data['footer_icon3_url']);?>" class="fa fa-<?php echo esc_attr($smof_data['footer_icon3']);?>" title="<?php echo esc_attr($smof_data['footer_icon3_title']);?>"></a><?php } ?>
                                            <?php if($smof_data['footer_icon4']) { ?><a href="<?php echo esc_url($smof_data['footer_icon4_url']);?>" class="fa fa-<?php echo esc_attr($smof_data['footer_icon4']);?>" title="<?php echo esc_attr($smof_data['footer_icon4_title']);?>"></a><?php } ?>
                                                </div>   
                                            <?php } ?>
                                </div>
                                <div class="footer-address footer-bottom-1 col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <?php if(is_active_sidebar('sidebar-5')) {?>
                                        <?php dynamic_sidebar('sidebar-5'); ?>
                                    <?php } elseif(esc_attr($smof_data['footer_address'])!='') { ?>
                                        <div class="cms-address">
                                            <?php echo apply_filters('the_content',$smof_data['footer_address']);?>
                                        </div>
                                    <?php } ?>
                                    <div class="footer-copyright  footer-bottom-2">
                                        <?php if(is_active_sidebar('sidebar-6')) {?>
                                            <?php dynamic_sidebar('sidebar-6'); ?>
                                        <?php } elseif($smof_data['footer_copyright']!='') { ?>
                                            <div class="cms-copyright">
                                                <?php echo apply_filters('the_content',$smof_data['footer_copyright']);?>
                                            </div>   
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>   
                <?php 
                    break;
                    case '4':
                ?>
                    <div id="cms-footer-bottom" class="layout-<?php echo $footer_bottom_layout;?>">
                        <div class="container"> 
                            <div class="footer-address footer-bottom-1">
                            <?php if(is_active_sidebar('sidebar-5')) {?>
                                    <?php dynamic_sidebar('sidebar-5'); ?>
                            <?php } elseif(esc_attr($smof_data['footer_address'])!='') { ?>
                                <div class="cms-address">
                                    <?php echo apply_filters('the_content',$smof_data['footer_address']);?>
                                </div>
                            <?php } ?>
                            </div>
                            <div class="footer-social footer-bottom-3">
                                <?php if(is_active_sidebar('sidebar-7')) {?>
                                    <?php dynamic_sidebar('sidebar-7'); ?>
                                <?php } else { ?>
                                    <div class="cms-social">
                                        <?php if($smof_data['footer_icon1']) { ?><a href="<?php echo esc_url($smof_data['footer_icon1_url']);?>" class="fa fa-<?php echo esc_attr($smof_data['footer_icon1']);?>" title="<?php echo esc_attr($smof_data['footer_icon1_title']);?>"></a><?php } ?>
                                        <?php if($smof_data['footer_icon2']) { ?><a href="<?php echo esc_url($smof_data['footer_icon2_url']);?>" class="fa fa-<?php echo esc_attr($smof_data['footer_icon2']);?>" title="<?php echo esc_attr($smof_data['footer_icon2_title']);?>"></a><?php } ?>
                                        <?php if($smof_data['footer_icon3']) { ?><a href="<?php echo esc_url($smof_data['footer_icon3_url']);?>" class="fa fa-<?php echo esc_attr($smof_data['footer_icon3']);?>" title="<?php echo esc_attr($smof_data['footer_icon3_title']);?>"></a><?php } ?>
                                        <?php if($smof_data['footer_icon4']) { ?><a href="<?php echo esc_url($smof_data['footer_icon4_url']);?>" class="fa fa-<?php echo esc_attr($smof_data['footer_icon4']);?>" title="<?php echo esc_attr($smof_data['footer_icon4_title']);?>"></a><?php } ?>
                                    </div>   
                                <?php } ?>
                            </div>
                        </div>
                        <div class="footer-copyright footer-bottom-2">
                            <div class="container">
                                <?php if(is_active_sidebar('sidebar-6')) {?>
                                    <?php dynamic_sidebar('sidebar-6'); ?>
                                <?php } elseif($smof_data['footer_copyright']!='') { ?>
                                    <div class="cms-copyright">
                                        <?php echo apply_filters('the_content',$smof_data['footer_copyright']);?>
                                    </div>   
                                <?php } ?>
                            </div>
                        </div>
                    </div>   
                <?php 
                    break;
                    case '5':
                ?>
                    <div id="cms-footer-bottom" class="layout-<?php echo $footer_bottom_layout;?>">
                        <div class="container">
                             <div class="row">
                                
                                <div class="footer-social footer-bottom-3 col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <?php if(is_active_sidebar('sidebar-7')) {?>
                                        <?php dynamic_sidebar('sidebar-7'); ?>
                                    <?php } else { ?>
                                        <div class="cms-social">
                                            <?php if($smof_data['footer_icon1']) { ?><a href="<?php echo esc_url($smof_data['footer_icon1_url']);?>" class="fa fa-<?php echo esc_attr($smof_data['footer_icon1']);?>" title="<?php echo esc_attr($smof_data['footer_icon1_title']);?>"></a><?php } ?>
                                            <?php if($smof_data['footer_icon2']) { ?><a href="<?php echo esc_url($smof_data['footer_icon2_url']);?>" class="fa fa-<?php echo esc_attr($smof_data['footer_icon2']);?>" title="<?php echo esc_attr($smof_data['footer_icon2_title']);?>"></a><?php } ?>
                                            <?php if($smof_data['footer_icon3']) { ?><a href="<?php echo esc_url($smof_data['footer_icon3_url']);?>" class="fa fa-<?php echo esc_attr($smof_data['footer_icon3']);?>" title="<?php echo esc_attr($smof_data['footer_icon3_title']);?>"></a><?php } ?>
                                            <?php if($smof_data['footer_icon4']) { ?><a href="<?php echo esc_url($smof_data['footer_icon4_url']);?>" class="fa fa-<?php echo esc_attr($smof_data['footer_icon4']);?>" title="<?php echo esc_attr($smof_data['footer_icon4_title']);?>"></a><?php } ?>
                                        </div>   
                                    <?php } ?>
                                </div>
                                <div class="footer-address footer-bottom-1 col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <?php if(is_active_sidebar('sidebar-5')) {?>
                                        <?php dynamic_sidebar('sidebar-5'); ?>
                                    <?php } elseif(esc_attr($smof_data['footer_address'])!='') { ?>
                                        <div class="cms-address">
                                            <?php echo apply_filters('the_content',$smof_data['footer_address']);?>
                                        </div>
                                    <?php } ?>
                                    <div class="footer-copyright  footer-bottom-2">
                                        <?php if(is_active_sidebar('sidebar-6')) {?>
                                            <?php dynamic_sidebar('sidebar-6'); ?>
                                        <?php } elseif($smof_data['footer_copyright']!='') { ?>
                                            <div class="cms-copyright">
                                                <?php echo apply_filters('the_content',$smof_data['footer_copyright']);?>
                                            </div>   
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php 
                    break;
                    case '6':
                ?>
                    <div id="cms-footer-bottom" class="layout-<?php echo $footer_bottom_layout;?>">
                        <div class="row"> 
                            <div class="footer-address footer-bottom-1 col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <?php if(is_active_sidebar('sidebar-5')) {?>
                                    <?php dynamic_sidebar('sidebar-5'); ?>
                                <?php } elseif(esc_attr($smof_data['footer_address'])!='') { ?>
                                    <div class="cms-address">
                                        <?php echo apply_filters('the_content',$smof_data['footer_address']);?>
                                    </div>
                                <?php } ?>
                                <div class="footer-copyright  footer-bottom-2">
                                    <?php if(is_active_sidebar('sidebar-6')) {?>
                                        <?php dynamic_sidebar('sidebar-6'); ?>
                                    <?php } elseif($smof_data['footer_copyright']!='') { ?>
                                        <div class="cms-copyright">
                                            <?php echo apply_filters('the_content',$smof_data['footer_copyright']);?>
                                        </div>   
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="footer-social footer-bottom-3 col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <?php if(is_active_sidebar('sidebar-7')) {?>
                                    <?php dynamic_sidebar('sidebar-7'); ?>
                                <?php } else { ?>
                                    <div class="cms-social">
                                        <?php if($smof_data['footer_icon1']) { ?><a href="<?php echo esc_url($smof_data['footer_icon1_url']);?>" class="fa fa-<?php echo esc_attr($smof_data['footer_icon1']);?>" title="<?php echo esc_attr($smof_data['footer_icon1_title']);?>"></a><?php } ?>
                                        <?php if($smof_data['footer_icon2']) { ?><a href="<?php echo esc_url($smof_data['footer_icon2_url']);?>" class="fa fa-<?php echo esc_attr($smof_data['footer_icon2']);?>" title="<?php echo esc_attr($smof_data['footer_icon2_title']);?>"></a><?php } ?>
                                        <?php if($smof_data['footer_icon3']) { ?><a href="<?php echo esc_url($smof_data['footer_icon3_url']);?>" class="fa fa-<?php echo esc_attr($smof_data['footer_icon3']);?>" title="<?php echo esc_attr($smof_data['footer_icon3_title']);?>"></a><?php } ?>
                                        <?php if($smof_data['footer_icon4']) { ?><a href="<?php echo esc_url($smof_data['footer_icon4_url']);?>" class="fa fa-<?php echo esc_attr($smof_data['footer_icon4']);?>" title="<?php echo esc_attr($smof_data['footer_icon4_title']);?>"></a><?php } ?>
                                    </div>   
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php 
                    break;
                    case '7':
                ?>
                    <div id="cms-footer-bottom" class="layout-<?php echo $footer_bottom_layout;?>">
                        <div class="container">
                            <div class="footer-address footer-bottom-1">
                                <?php if(is_active_sidebar('sidebar-5')) {?>
                                    <?php dynamic_sidebar('sidebar-5'); ?>
                                <?php } elseif(esc_attr($smof_data['footer_address'])!='') { ?>
                                    <div class="cms-address text-center">
                                        <?php echo apply_filters('the_content',$smof_data['footer_address']);?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="footer-copyright-wrapper">
                            <div class="container footer-copyright  footer-bottom-2">
                                <?php if(is_active_sidebar('sidebar-6')) {?>
                                    <?php dynamic_sidebar('sidebar-6'); ?>
                                <?php } elseif($smof_data['footer_copyright']!='') { ?>
                                    <div class="cms-copyright text-center">
                                        <div class="footer-copyright-logo"><a href="<?php echo home_url(); ?>"><img alt="" src="<?php echo esc_url($smof_data['footer_bottom_logo']['url']); ?>"></a></div>
                                        <?php echo apply_filters('the_content',$smof_data['footer_copyright']);?>
                                    </div>   
                                <?php } ?>
                            </div>
                        </div>
                        <div class="footer-social footer-bottom-3">
                            <div class="container">
                            <?php if(is_active_sidebar('sidebar-7')) {?>
                                <?php dynamic_sidebar('sidebar-7'); ?>
                            <?php } else { ?>
                                <div class="cms-social text-center">
                                    <?php if($smof_data['footer_icon1']) { ?><a href="<?php echo esc_url($smof_data['footer_icon1_url']);?>" class="fa fa-<?php echo esc_attr($smof_data['footer_icon1']);?>" title="<?php echo esc_attr($smof_data['footer_icon1_title']);?>"></a><?php } ?>
                                    <?php if($smof_data['footer_icon2']) { ?><a href="<?php echo esc_url($smof_data['footer_icon2_url']);?>" class="fa fa-<?php echo esc_attr($smof_data['footer_icon2']);?>" title="<?php echo esc_attr($smof_data['footer_icon2_title']);?>"></a><?php } ?>
                                    <?php if($smof_data['footer_icon3']) { ?><a href="<?php echo esc_url($smof_data['footer_icon3_url']);?>" class="fa fa-<?php echo esc_attr($smof_data['footer_icon3']);?>" title="<?php echo esc_attr($smof_data['footer_icon3_title']);?>"></a><?php } ?>
                                    <?php if($smof_data['footer_icon4']) { ?><a href="<?php echo esc_url($smof_data['footer_icon4_url']);?>" class="fa fa-<?php echo esc_attr($smof_data['footer_icon4']);?>" title="<?php echo esc_attr($smof_data['footer_icon4_title']);?>"></a><?php } ?>
                                </div>   
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php 
                    break;
                    case '8':
                ?>
                    <div id="cms-footer-bottom" class="layout-<?php echo $footer_bottom_layout;?>">
                        <div class="container">
                            <div class="row">
                                <div class="footer-social footer-bottom-3 col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <?php if(is_active_sidebar('sidebar-7')) {?>
                                        <?php dynamic_sidebar('sidebar-7'); ?>
                                    <?php } else { ?>
                                        <div class="cms-social">
                                            <?php if($smof_data['footer_icon1']) { ?><a href="<?php echo esc_url($smof_data['footer_icon1_url']);?>" class="fa fa-<?php echo esc_attr($smof_data['footer_icon1']);?>" title="<?php echo esc_attr($smof_data['footer_icon1_title']);?>"></a><?php } ?>
                                            <?php if($smof_data['footer_icon2']) { ?><a href="<?php echo esc_url($smof_data['footer_icon2_url']);?>" class="fa fa-<?php echo esc_attr($smof_data['footer_icon2']);?>" title="<?php echo esc_attr($smof_data['footer_icon2_title']);?>"></a><?php } ?>
                                            <?php if($smof_data['footer_icon3']) { ?><a href="<?php echo esc_url($smof_data['footer_icon3_url']);?>" class="fa fa-<?php echo esc_attr($smof_data['footer_icon3']);?>" title="<?php echo esc_attr($smof_data['footer_icon3_title']);?>"></a><?php } ?>
                                            <?php if($smof_data['footer_icon4']) { ?><a href="<?php echo esc_url($smof_data['footer_icon4_url']);?>" class="fa fa-<?php echo esc_attr($smof_data['footer_icon4']);?>" title="<?php echo esc_attr($smof_data['footer_icon4_title']);?>"></a><?php } ?>
                                        </div>   
                                    <?php } ?>
                                    <div class="footer-copyright  footer-bottom-2">
                                        <?php if(is_active_sidebar('sidebar-6')) {?>
                                            <?php dynamic_sidebar('sidebar-6'); ?>
                                        <?php } elseif($smof_data['footer_copyright']!='') { ?>
                                            <div class="cms-copyright">
                                                <?php echo apply_filters('the_content',$smof_data['footer_copyright']);?>
                                            </div>   
                                        <?php } ?>
                                    </div>
                                </div> 
                                <div class="footer-address footer-bottom-1 col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <?php if(is_active_sidebar('sidebar-5')) {?>
                                        <?php dynamic_sidebar('sidebar-5'); ?>
                                    <?php } elseif(esc_attr($smof_data['footer_address'])!='') { ?>
                                        <div class="cms-address text-right col-md-8 col-lg-8 pull-right">
                                            <?php echo apply_filters('the_content',$smof_data['footer_address']);?>
                                        </div>
                                    <?php } ?>
                                </div> 
                            </div>
                        </div>
                    </div>
                <?php 
                    break;
                    case '13':
                ?>
                    <div id="cms-footer-bottom" class="layout-2 layout-<?php echo $footer_bottom_layout;?>">
                        <div class="container">
                             <div class="row">
                                <div class="footer-address footer-bottom-1 col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <?php if(is_active_sidebar('sidebar-5')) {?>
                                        <?php dynamic_sidebar('sidebar-5'); ?>
                                    <?php } elseif(esc_attr($smof_data['footer_address'])!='') { ?>
                                        <div class="cms-address">
                                            <?php echo apply_filters('the_content',$smof_data['footer_address']);?>
                                        </div>
                                    <?php } ?>
                                    <div class="footer-copyright  footer-bottom-2">
                                        <?php if(is_active_sidebar('sidebar-6')) {?>
                                            <?php dynamic_sidebar('sidebar-6'); ?>
                                        <?php } elseif($smof_data['footer_copyright']!='') { ?>
                                            <div class="cms-copyright">
                                                <?php echo apply_filters('the_content',$smof_data['footer_copyright']);?>
                                            </div>   
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
                <?php 
                    break;
                    default:
                ?>  
                    <div id="cms-footer-bottom" class="layout-<?php echo $footer_bottom_layout;?>">
                        <div class="container">
                            <div class="footer-address footer-bottom-1">
                                <?php if(is_active_sidebar('sidebar-5')) {?>
                                    <?php dynamic_sidebar('sidebar-5'); ?>
                                <?php } elseif(esc_attr($smof_data['footer_address']) !='') { ?>
                                    <div class="cms-address">
                                        <?php echo apply_filters('the_content',$smof_data['footer_address']);?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="footer-copyright  footer-bottom-2">
                                <?php if(is_active_sidebar('sidebar-6')) {?>
                                    <?php dynamic_sidebar('sidebar-6'); ?>
                                <?php } elseif($smof_data['footer_copyright']!='') { ?>
                                    <div class="cms-copyright">
                                        <?php echo apply_filters('the_content',$smof_data['footer_copyright']);?>
                                    </div>   
                                <?php } ?>
                            </div>
                             <div class="footer-social footer-bottom-3">
                                    <?php if(is_active_sidebar('sidebar-7')) {?>
                                        <?php dynamic_sidebar('sidebar-7'); ?>
                                    <?php } else { ?>
                                        <div class="cms-social-sc">
                                            <?php if($smof_data['footer_icon1']) { ?><a href="<?php echo esc_url($smof_data['footer_icon1_url']);?>" class="fa fa-<?php echo esc_attr($smof_data['footer_icon1']);?>" title="<?php echo esc_attr($smof_data['footer_icon1_title']);?>"></a><?php } ?>
                                            <?php if($smof_data['footer_icon2']) { ?><a href="<?php echo esc_url($smof_data['footer_icon2_url']);?>" class="fa fa-<?php echo esc_attr($smof_data['footer_icon2']);?>" title="<?php echo esc_attr($smof_data['footer_icon2_title']);?>"></a><?php } ?>
                                            <?php if($smof_data['footer_icon3']) { ?><a href="<?php echo esc_url($smof_data['footer_icon3_url']);?>" class="fa fa-<?php echo esc_attr($smof_data['footer_icon3']);?>" title="<?php echo esc_attr($smof_data['footer_icon3_title']);?>"></a><?php } ?>
                                            <?php if($smof_data['footer_icon4']) { ?><a href="<?php echo esc_url($smof_data['footer_icon4_url']);?>" class="fa fa-<?php echo esc_attr($smof_data['footer_icon4']);?>" title="<?php echo esc_attr($smof_data['footer_icon4_title']);?>"></a><?php } ?>
                                        </div>   
                                    <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php 
                    break;
                }?>
            <?php } ?>
        </div>
        </footer><!-- #footer-wrapper -->
    </div><!-- #page -->
    <?php if($smof_data['header_layout'] == 'v4') { ?>
        <div id="cms-mainnav-v4" class="cms-menu">
            <a id="cms-hide-mainnav"><i class="pe-7s-close"></i></a>
            <div class="cms-mainnav-v4-logo">
                <a href="<?php echo home_url(); ?>"><img alt="" src="<?php echo esc_url($smof_data['header_main_logo']['url']); ?>"></a>
            </div>
            <?php
            
            $attr = array(
                'menu' =>cms_menu_location(),
                'menu_class' => 'nav-menu',
            );
            
            $menu_locations = get_nav_menu_locations();
            
            if(!empty($menu_locations['primary'])){
                $attr['theme_location'] = 'primary';
            }
            
            /* enable mega menu. */
            if(class_exists('HeroMenuWalker')){ $attr['walker'] = new HeroMenuWalker(); }
            
            /* main nav. */
            wp_nav_menu( $attr ); ?>
        </div>
    <?php } ?>
    <?php wp_footer(); ?>
</body>
</html>