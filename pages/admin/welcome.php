<?php

$sqlhousemaid="select * from product";
$rowhousemaid=$con->query($sqlhousemaid);
$countnewhousemaid=$rowhousemaid->num_rows;


$qryorder="select * from transaksi where status <>'Lunas'";
$roworder=$con->query($qryorder);
$dataorder=$roworder->fetch_array();
?>            


            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $roworder->num_rows; ?></div>
                                    <div>New Orders!</div>
                                </div>
                            </div>
                        </div>
                        <a href="?pages=transaksi">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-archive fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $countnewhousemaid; ?></div>
                                    <div>Product!</div>
                                </div>
                            </div>
                        </div>
                        <a href="?pages=input_product">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>