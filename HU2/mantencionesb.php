<?php
                                include('../con_db.php');
                                $consulta = "SELECT t.TIPOTITULO,m.TITULO,m.DESCRIPCION,p.FECHA,m.ESTADO,v.RUT,v.NOMBRE,m.IDM FROM MANTENCION m, TIPO t, PIDE p, VECINO v  WHERE p.IDM = m.IDM and v.IDV=p.IDV and m.IDT=t.IDT";
                                $resultado = mysqli_query($conex,$consulta);
                                if($resultado){
                                    while($row = $resultado->fetch_array()){
                                        if ($row['ESTADO']=='P') {
                                            $row['ESTADO']='Pendiente';
                                        }
                                        if ($row['ESTADO']=='T') {
                                            $row['ESTADO']='Terminado';
                                        }
                                        if ($row['ESTADO']=='A') {
                                            $row['ESTADO']='Aprobado';
                                        }
                                        echo'
                                <tr>
                                    <td class="text-center">'.$row["TIPOTITULO"].'</td>
                                    <td class="text-center">'.$row["TITULO"].'</td>
                                    <td class="text-center">'.$row["DESCRIPCION"].'</td>
                                    <td class="text-center">'.$row["FECHA"].'</td>
                                    <td class="text-center">'.$row["NOMBRE"].'</td>
                                    <td class="text-center">'.$row["RUT"].'</td>
                                    <td class="text-center">'.$row["ESTADO"].'</td>';
                                    if($row["ESTADO"] == "Pendiente"){
                                        echo '<td class="text-center"><a href="aceptar.php?idm='.$row["IDM"].'"type="button" class="btn btn-success" onclick="return ConfirmarEstado()">
                                        Aprobar
                                      </a><button href="eliminar.php?idm= "type="button" class="btn btn-danger">
                                      Eliminar
                                    </button><button href="editar.php?idm= "type="button" class="btn btn-primary">
                                    Editar
                                  </button></td>
                                    </tr>
                                    ';
                                    }else{
                                        if($row["ESTADO"] =="Aprobado"){
                                            echo '<td class="text-center"><a href="finalizar.php?idm='.$row["IDM"].'"type="button" class="btn btn-danger" onclick="return ConfirmarEstado()">
                                        Finalizar
                                      </a><button href="eliminar.php?idm= "type="button" class="btn btn-danger">
                                      Eliminar
                                    </button><button href="editar.php?idm= "type="button" class="btn btn-primary">
                                    Editar
                                  </button></td>
                                    </tr>
                                    ';
                                        }else{
                                            echo '<td class="text-center"><button href="editar.php?idm= "type="button" class="btn btn-secondary" disabled="disabled">
                                            Finalizada
                                          </button><button href="eliminar.php?idm= "type="button" class="btn btn-danger">
                                          Eliminar
                                        </button><button href="editar.php?idm= "type="button" class="btn btn-primary">
                                        Editar
                                      </button></td>
                                        </tr>
                                        ';
                                        }
                                        
                                    }
                                    
                                
                                    }
                                }
                                ?>