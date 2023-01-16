<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use kartik\widgets\Select2;


// Pilihan Filter Kriteria
$ckriteria = ['no_anggota' => Yii::t('app','Penginput Data'),
        'peminjaman' => Yii::t('app','Tanggal Peminjaman'),
        'jatuh_tempo' => Yii::t('app','Tanggal Jatuh Tempo')];
?>


<!-- Group plus minus dan pilih kriteria -->
<div class="row col-sm-12 gap-padding10 multi-field">
    <div class="col-sm-4 padding0">
        <div class="input-group">

            <div class="input-group-btn">
                <button type="button" class="btn btn-danger remove-field"><span class="glyphicon glyphicon-minus-sign"></span></button>
                <!-- <button type="button" class="btn btn-success add2"><span class="glyphicon glyphicon-plus-sign"></span></button> -->
            </div>

            <div class="input-group">
                <?= Html::dropDownList( 'kriterias[]',
                    'selected option',  
                    $ckriteria, 
                    ['class' => 'col-sm-12 select2 pilihKriteria'.$i,'placeholder' => Yii::t('app','Choose').' '.Yii::t('app','Kriteria')]
                    ); ?>
            </div>
        </div>
    </div>

    <div id="" class="col-sm-8 content-kriteria<?= $i ?>" >

    </div>
</div>
<!-- /Group plus minus dan pilih kriteria -->

<script type="text/javascript">
    $('.pilihKriteria<?= $i ?>').select2();
    $('.remove-field').click(function(e) {
        $(this).parent('.input-group-btn').parent('.input-group').parent('.col-sm-4').parent('.multi-field').remove();
        //klo tinggal satu ga bisa di apus
        // if($('.multi-field').length > 1) {
            // $(this).parent('.input-group-btn').parent('.input-group').parent('.col-sm-4').parent('.multi-field').remove();
        // }
    });

        // Pilih Kriteria per Row
    $('#pilihan-Kriteria').on('change','.pilihKriteria<?= $i ?>',function(){ 
        $( '.content-kriteria<?= $i ?> ' ).html('<div style=\"padding-top: 10px;\">Loading...</div>'); 
        var kriteria = $(this).val();
        console.log(kriteria);
     
        $.get('load-filter-kriteria',{kriteria : kriteria},function(data){
            if (data == '') 
            {
                $( '.content-kriteria<?= $i ?>' ).html( '' );   
            } 
            else 
            {
                $( '.content-kriteria<?= $i ?>' ).html( data ); 
                $('.content-kriteria<?= $i ?> select').select2({
                // allowClear: true,
                });
                $('.content-kriteria<?= $i ?>').find('#w0').kvDatepicker({format: 'dd-mm-yyyy', todayHighlight: true, autoclose: true});
                $('.content-kriteria<?= $i ?>').find('#w0-2').kvDatepicker({format: 'dd-mm-yyyy', todayHighlight: true, autoclose: true});
            }
        });
    });
</script>