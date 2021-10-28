<?
/* 
Miercoles 09 de Diciembre 2020
- creación en parte de usuario administrador y Academico de formato de reporte general de alumnos
	archivos modificados:
			-layouts/header

	Archivos creados
*/

<tr>
											<td>TECNOLOGIA</td>
											<td>
												<?php 
													if($trim->val==1){
														$tap1= $this->Reportes_model->TallerAp11(); echo $tap1;
													}else{
														if($trim->val==2){
															$tap1= $this->Reportes_model->TallerAp12(); echo $tap1;
															}else{
															if($trim->val==3){
																$tap1= $this->Reportes_model->TallerAp13(); echo $tap1;
																}
															}
													}
												?>
											</td>
											<td>
											<?php 
													if($trim->val==1){
														$tap2= $this->Reportes_model->TallerAp21(); echo $tap2;
													}else{
														if($trim->val==2){
															$tap2= $this->Reportes_model->TallerAp22(); echo $tap2;
															}else{
															if($trim->val==3){
																$tap2= $this->Reportes_model->TallerAp23(); echo $tap2;
																}
															}
													}
												?>
											</td>
											<td>
											<?php 
													if($trim->val==1){
														$tap3= $this->Reportes_model->TallerAp31(); echo $tap3;
													}else{
														if($trim->val==2){
															$tap3= $this->Reportes_model->TallerAp32(); echo $tap3;
															}else{
															if($trim->val==3){
																$tap3= $this->Reportes_model->TallerAp33(); echo $tap3;
																}
															}
													}
												?>
											</td>
											<td>
												<?php $totalap=$tap1+$tap2+$tap3; echo $totalap; ?>
											</td>


											<td> 
												<?php $rep1=$primero-$tap1; echo $rep1; ?>
											</td>
											<td> 
												<?php  $rep2=$segundo-$tap2; echo $rep2; ?>
											</td>
											<td>
												<?php $rep3=$tercero-$tap3; echo $rep3; ?>
											</td>
											<td>
												<?php $totalrep=$rep1+$rep2+ $rep3; echo $totalrep; ?>
											</td>

											
											<td> 
												<?php echo $rep1; ?>
											</td>
											<td> 
												<?php   echo $rep2; ?>
											</td>
											<td>
												<?php echo $rep3; ?>
											</td>
											<td>
												<?php  echo $totalrep; ?>
											</td>

											<td><?php $tprom1=($rep1*10)/$primero; printf("%0.1f",$tprom1); ?></td>
											<td><?php $tprom2=($rep2*10)/$segundo; printf("%0.1f",$tprom2); ?></td>
											<td><?php $tprom3=($rep3*10)/$tercero; printf("%0.1f",$tprom3); ?></td>
											<td><?php ($tprom4=$tprom1+$tprom2+$tprom3)/3; printf("%0.1f",$tprom4); ?></td>

											<td><?php $tprom4=($tap1*10)/$primero; printf("%0.1f",$tprom4); ?></td>
											<td><?php $tprom5=($tap2*10)/$segundo; printf("%0.1f",$tprom5); ?></td>
											<td><?php $tprom6=($tap3*10)/$tercero; printf("%0.1f",$tprom6); ?></td>
											<td><?php ($tprom7=$tprom4+$tprom5+$tprom6)/3; printf("%0.1f",$tprom7); ?></td>

											<td> 
												<?php 
												if($trim->val==1){
													$tp1= $this->Reportes_model->Tallerprom11(); printf("%0.1f",$tp1->prom);
												}else{
													if($trim->val==2){
														$tp1= $this->Reportes_model->Tallerprom12(); printf("%0.1f",$tp1->prom);
														}else{
														if($trim->val==3){
															$tp1= $this->Reportes_model->Tallerprom13(); printf("%0.1f",$tp1->prom);
															}
														}
												}
												?>

											</td>
											<td>
											<?php 
												if($trim->val==1){
													$tp2= $this->Reportes_model->Tallerprom21(); printf("%0.1f",$tp2->prom);
												}else{
													if($trim->val==2){
														$tp2= $this->Reportes_model->Tallerprom22(); printf("%0.1f",$tp2->prom);
														}else{
														if($trim->val==3){
															$tp2= $this->Reportes_model->Tallerprom23(); printf("%0.1f",$tp2->prom);
															}
														}
												}
												?>
											</td>
											<td>
											<?php 
												if($trim->val==1){
													$tp3= $this->Reportes_model->Tallerprom31(); printf("%0.1f", $tp3->prom);
												}else{
													if($trim->val==2){
														$tp3= $this->Reportes_model->Tallerprom32(); printf("%0.1f", $tp3->prom);
														}else{
														if($trim->val==3){
															$tp3= $this->Reportes_model->Tallerprom33(); printf("%0.1f", $tp3->prom);
															}
														}
												}
												?>
											</td>
											<td> <?php 
												$promtaller=($tp1->prom+$tp2->prom+$tp3->prom)/3; printf("%0.1f", $promtaller);
											?> </td>
										</tr>
