<?php 
$generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
?>
	
	
	<?php 
	$no=0;
	$item=0;
	$rec=0;
	$jumlahData=count($LabelData);
	foreach ($LabelData as $LabelData): 
	$rec++; 

	if($item == 0){
		echo '<div style="padding-top:15px; padding-left:0px; ">';
		echo '<table cellspacing="0" cellpadding="0" border="0" >';
	}

	if($no==0)
	{
		echo '
	<tr>';
	}

	?>

	<td style="width:197px; padding-bottom: 2.4px;padding-top: 0px; text-align: center; border:solid 0px white;">
		<table style="width: 99%; margin-left:2px; margin-bottom:5px;" cellpadding="0" cellspacing="0" border="0" >
			<tr>
				<td style="height: 66px; width:100%; text-align: center; border:solid 1px #CCC;">
					<span style="font-size: 12px"><?=$LabelData['Title']?>
					<br>
					<?php 
					echo '<img style="padding-top:5px;width:150; height:24px;" src="data:image/png;base64,' . base64_encode($generator->getBarcode($LabelData['Barcode'], $generator::TYPE_CODE_39,1)) . '">';
					?>
					<br>
					*<?=$LabelData['Barcode']?>*
					</span> 
				</td>
			</tr>
		</table>
	</td>
	<!-- <td style="width:7px;">

	</td> -->
	<?php

	if($no == 2 || $i == ($jumlahData -0))
    {
       if($i == ($jumlahData -0))
       {
            echo '<td style="width:50%;padding-bottom: 10px; padding-right: 0px; text-align: left;">&nbsp;</td>';
       }
       echo '</tr>';
       $no=0;
    }else{
       $no++;
    }

	if($item == 29 || $rec == $jumlahData)
    {
       echo '</table>';
       echo '</div>';
       $item=0;
    }else{
       $item++;
    }

	?>
	

	<?php
	endforeach 
	?>
					