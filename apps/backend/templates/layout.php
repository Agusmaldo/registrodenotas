<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <link rel="shortcut icon" href="/favicon.ico" />
        <?php include_stylesheets() ?>
        <script>
            var myBase = "<?php echo $sf_request->getUriPrefix() . $sf_request->getRelativeUrlRoot() ?>/pmJSCookMenuPlugin/images/ThemePanel/";
            var myThemePanelBase = myBase;
        </script>
        <?php include_javascripts() ?>

    </head>
    <body background="<?php echo image_path('Background.jpg')?>">

        <?php if ($sf_user->isAuthenticated()): ?>     

            <div class="ui-state-default ui-corner-all" id="menudiv" >
                <div style="margin:4px 4px;" >  
                    <?php $menu = pmJSCookMenu::createFromYaml(sfConfig::get("sf_app_config_dir") . "/menu.yml") ?>
                    <?php echo $menu->render() ?>
                </div>
            </div>

    <!-- <p><?php echo link_to('Logout', 'sf_guard_signout') ?></p> -->
                    
                    <?php if ($sf_user->hasFlash('notice')): ?>
                        <div id="notificaciones" class="flash_notice ui-state-highlight"><?php echo $sf_user->getFlash('notice') ?></div>
                    <?php endif ?>

                    <?php if ($sf_user->hasFlash('error')): ?>
                        <div id="notificaciones" class="ui-state-error"><?php echo $sf_user->getFlash('error') ?></div>
                    <?php endif ?>
                        
                        <div id="notificaciones"></div>
                        
                
            




        <?php endif ?> 

        <div class="ui-tabs-panel ui-widget-content">    

            <?php echo $sf_content ?>

        </div>


    </body>
</html>
