
<div class="row col-md-12">
<div class="row col-md-10">
    <?php foreach($bienvenida as $mensaje){ ?>
        <div class="row col-md-10 pull-left vertical-top">
            <div class="row col-md-10">
                <div class="col-md-2">
                    <img class="img-circle" src="<?=base_url('assets/img/').$mensaje->imagen?>" style="height: 90px; width: 90px;">
                </div>
                 <div class="col-md-10" style="padding-left: 25px;">
                     <h1 class="quote text-uppercase" style="font-size: 24px; font-family: Times-new-roman;"><?= $mensaje->mensaje; ?></h1>
                 </div>
            </div>           
        </div>
    <?php } ?>
</div>
<div class="row col-md-2">
    
</div>
</div>

