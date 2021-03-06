<?php 
 require 'vendor/autoload.php'; 
                    
 use PhpOffice\PhpSpreadsheet\Spreadsheet;
 use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
 use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
 
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Fairtex</title>

  <!-- Custom fonts for this theme -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Theme CSS -->
  <link href="<?php echo base_url(); ?>assets/css/freelancer.min.css" rel="stylesheet">

  <style>
  /* Make the image fully responsive */
  .carousel-inner img {
    width: 100%;
    height: 100%;
  }

  .bg {
  /* The image used */
  background-image: url("<?php echo base_url(); ?>assets/img/bg/bg1.jpg");
 
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
  
  </style>  

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-md bg text-uppercase fixed-top" id="mainNav" >
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="<?php echo base_url(); ?>assets/img/logo/Fairtex-shop.png"  height="60"></a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="<?php echo base_url(); ?>login/member">Home</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
          <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="<?php echo base_url(); ?>loaddatatable">Product</a>
          </li>
          <!-- <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">About</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">Contact</a>
          </li> -->
		      <li class="nav-item mx-0 mx-lg-1">

          <?php  if (isset($_SESSION['member_username'])){ ?>
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="<?php echo base_url(); ?>">Logout</a>
              <?php
          }else{ ?>
           <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="<?php echo base_url(); ?>login">Login</a>
          <?php } ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Masthead -->
  <!-- <header class="masthead bg-primary text-white text-center"> -->
  <header class=" text-white text-center">
  <br><br><br><br><br>
  </header>
  <br>
  <section id="checkout">
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col-4"><br><img src="<?php echo base_url(); ?>assets/img/logo/Fairtex-shop-checkout.png"></div> 
                <div class="col-4"></div> 
                <div class="col-4">
                    <h6>FAIRTEX EQUIPMENT CO.,LTD.</h6>
                    <label>99/5, MOO3, SOI BOONTHAMANUSORN</label>
                    <label>THEPARAK RD.,BANGPLEEYAI, BANGPLEE,</label>
                    <label>SAMUTPRAKARN 10540, THAILAND</label>
                    <label>TEL (662)3855148,3855149   FAX(662)3855403</label> 
                </div> 
            </div> 
        </div> 
    </div>
    <br><br>
    <!-- <!?php echo $_SESSION['customerName'];  ?> action="<?php echo base_url(); ?>report" method="POST" -->
 
    <form class="login100-form validate-form" action="#" method="POST">
    <div class="container">
        <div class="row"> 
            <div class="col-4"> 
                <h6>CONSIGNEE:   </h6><textarea class="form-control" rows="4" id="consigee" name="consigee" ><?php if(isset($_SESSION['customerName'])){ echo $_SESSION['customerName'];} ?></textarea> 
            </div>  
            <div class="col-4"> 
                <h6>SHIP TO : </h6><textarea class="form-control" rows="4" id="shipTo" name="shipTo"><?php if(isset($_SESSION['customerAddress'])){ echo $_SESSION['customerAddress']; } ?></textarea> 
            </div> 
            <div class="col-4"> 
              <h6>INVOICE NO. : </h6><input class="form-control"  id="invoiceNo" name="invoiceNo" value="<?php echo $invoceNo?>">
              <h6>DATE : </h6><input class="form-control"  id="dateInvoice" name="dateInvoice" value="<?php echo $fullDate?>">
              <input type="hidden" class="form-control"  id="costType" name="costType" value="<?php echo $costType;?>">
              
            </div>
        </div>
        <br>

        <?php if(isset($_SESSION['userType'])){
        if($_SESSION['userType'] == 'administrator'){?>
        <div class="row"> 
            <div class="col-4"></div>  
            <div class="col-4"> 
              <br><br>
              <h6>FREIGHT CHARGE : FREIGHT COLLECT </h6>
            </div> 
            <div class="col-4"> 
              <h6>BY : </h6><textarea class="form-control" rows="2" id="by" name="by"></textarea> 
            </div>  
        </div>
      
        <div class="row"> 
            <div class="col-4">
              <br><br>
              <h6>TERM OF SALE : FOB (BANGKOK)</h6>
            </div>  
            <div class="col-4"> 
              <h6>TO : </h6><textarea class="form-control" rows="2" id="to" name="to"></textarea>
            </div> 
            <div class="col-4"> 
              <h6>FROM : </h6><textarea class="form-control" rows="2" id="from" name="from" value="Bangkok Thailand" readOnly>Bangkok Thailand</textarea> 
            </div>  
        </div>
        <?php }
      } ?>
        <br>
        <div id="reload">
          <table class="table"  id="productTable">
            <thead>
              <tr>
                <th scope="col" style="text-align: center;" width="10%">SKU#</th>
                <th scope="col" style="text-align: center;" width="20%">Description</th>
                <th scope="col" style="text-align: center;" width="10%">Size</th>
                <th scope="col" style="text-align: center;" width="10%">Color</th> 
                <th scope="col" style="text-align: center;" width="10%">Qty.</th> 
                <th scope="col" style="text-align: center;" width="15%">UNIT PRICE</th>
                <th scope="col" style="text-align: center;" width="20%">AMOUNT ( <?php echo $_SESSION['currencyType']; ?>)</th>
                <!-- <th scope="col" style="text-align: center;" width="5%"></th> -->
              </tr>
            </thead>
            <tbody>
              <?php $index = 0;
                foreach ($this->cart->contents() as $items){
              ?> 
              <tr>
                <td style="text-align: center;"><?= $items['name'] ?></td>
                <td style="text-align: center;"><?= $items['options']['desc']  ?></td>
                <td style="text-align: center;"><?= $items['options']['size'] ?></td>
                <td style="text-align: center;"><?= $items['options']['color'] ?></td>
                <!-- <td style="text-align: center;" class='edit' value="<?= $items['rowid'] ?>" >  <input  style="border-style: none;"  type="text" name="quantity" id="<?= $items['rowid'] ?>" class="text-center" value="<?= $items['qty'] ?>" /> </td> -->
                <td style="text-align: center;"><?= $items['qty'] ?></td>
                <td style="text-align: center;"><?= $items['price']; if($_SESSION['currencyType'] == 'USD'){ echo ' $';}else{ echo ' ฿';}  ?></td>
                <td style="text-align: center;"><?= number_format($items['subtotal']); if($_SESSION['currencyType'] == 'USD'){ echo ' $';}else{ echo ' ฿';}  ?></td>
                <!-- <td style="text-align: center;"><span class="table-remove"><button type="button" onclick="delCart('<?= $items['rowid'] ?>')"
                  class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span></td>   -->
              </tr>

              <?php
              } 
              ?>
            </tbody>
          </table>
          </div>  
            
            <!-- delete cart -->
          <!--<a onclick="delCart('<!?= $items['rowid'] ?>')"><img src="<!?php echo base_url(); ?>assets/img/icon/cancel.png"></a> -->

        <?php if(isset($_SESSION['userType'])){
        if($_SESSION['userType'] == 'administrator'){?>
          <div class="row"> 
            <div class="col-8"></div>  
            <div class="col-2"><h6>Sub Total</h6></div>
            <input type="number" style="text-align: right;display:none;" class="form-control" id="total" name="total" value="<?php echo $this->cart->total() ?>">
            <div class="col-2" style="text-align: right;"> <h4><?=  number_format($this->cart->total()); if($_SESSION['currencyType'] == 'USD'){ echo ' $';}else{ echo ' ฿';}  ?></h4> </div>
          </div>
          <div class="row"> 
            <div class="col-8"></div>  
            <div class="col-2"><h6>Discount</h6></div>
            <div class="col-2" style="text-align: right;"><input type="number"  min="0" style="text-align: right;font-weight: bold;" size="150" class="form-control" id="discount" name="discount" onchange="totalFunction()" value=""></input></div>
          </div>
          <div class="row" style="margin-top: 6px;"> 
            <div class="col-8"></div> 
            <div class="col-2">
              <div class="row"> 
              <input type="hidden"  min="0" style=" text-align: right;font-weight: bold;" size="150" class="form-control" id="currType" name="currType" value="<?php if($_SESSION['currencyType'] == 'USD'){ echo ' $';}else{ echo ' ฿';}  ?>">
                <div class="col-6" style="text-align: right;" ><h6>Vat %</h6></div> <input type="hidden"  min="0" style=" text-align: right;font-weight: bold;" size="150" class="form-control" id="summaryHide" name="summaryHide" value="<?=  number_format($this->cart->total()) ?>">
                <div class="col-6" style="text-align: right;"><input type="number"  min="0" style="text-align: right;font-weight: bold;" size="50" class="form-control" id="vat" name="vat" onchange="totalFunction()"> </div> 
              </div>
            </div>
         
            <div class="col-2">  <input id="input" type="text" style="text-align: right;font-weight: bold;"  class="form-control" value="" disabled/>  </div>
            <!-- <div class="col-8"></div>  
            <div class="col-2"><h6> <input type="text" style="text-align: right;font-weight: bold;" size="50" class="form-control" id="namePrice1" name="namePrice1"></h6></div>
            <div class="col-2" style="text-align: right;"><input type="number" style="text-align: right;font-weight: bold;" size="150" class="form-control" id="addPrice1" name="addPrice1" onchange="totalFunction()"></input></div> -->
          </div>
          <div class="row" style="margin-top: 6px;"> 
            <div class="col-8"></div>  
            <div class="col-2"><h6><input type="text"  style="text-align: right;font-weight: bold;" size="150" class="form-control" id="namePrice2" name="namePrice2"></h6></div>
            <div class="col-2" style="text-align: right;"><input type="number"  min="0" style="text-align: right;font-weight: bold;" size="150" class="form-control" id="addPrice2" name="addPrice2" onchange="totalFunction()"></div>
          </div>
          <div class="row"> 
            <div class="col-8"></div>  
            <div class="col-2"><h6>shipping cost</h6></div>
            <div class="col-2" style="text-align: right;"><input type="number"  min="0" style="text-align: right;font-weight: bold;" size="150" class="form-control" id="shipping" name="shipping" onchange="totalFunction()"></div>
          </div>
          <br>
          <div class="row"> 
            <div class="col-8"></div>  
            <div class="col-2"><h4>Total</h4></div> 
            <div class="col-2" style="text-align: right;"><h4 id="summary"><?=  number_format($this->cart->total()); if($_SESSION['currencyType'] == 'USD'){ echo ' $';}else{ echo ' ฿';}  ?></h4></div>
          </div>  
        <?php }else{ ?>
          <div class="row"> 
            <div class="col-8"></div>  
            <div class="col-2"><h6>Sub Total</h6></div>
            <input type="number" style="text-align: right;display:none;" class="form-control" id="total" name="total" value="<?php echo $this->cart->total() ?>">
            <div class="col-2" style="text-align: right;"> <h4><?=  number_format($this->cart->total(), 2, '.', ''); if($_SESSION['currencyType'] == 'USD'){ echo ' $';}else{ echo ' ฿';}  ?></h4> </div>
          </div>
          <div class="row"> 
            <div class="col-8"></div>  
            <div class="col-2"><h6>Discount</h6></div>
            <input type="number" style="text-align: right;display:none;" class="form-control" id="total" name="total" value="">
            <div class="col-2" style="text-align: right;"> <h4><?php if(isset($_SESSION['discount'])){ echo number_format($_SESSION['discount']); if($_SESSION['currencyType'] == 'USD'){ echo ' $';}else{ echo ' ฿';}  } ?> </h4> </div>
          </div> 
          <div class="row"> 
            <div class="col-8"></div>  
            <div class="col-2"><h6>shipping cost</h6></div>
            <input type="number" style="text-align: right;display:none;" class="form-control" id="total" name="total" value="">
            <div class="col-2" style="text-align: right;"> <h4><?php if(isset($_SESSION['shippingCost'])){ echo number_format($_SESSION['shippingCost']); if($_SESSION['currencyType'] == 'USD'){ echo ' $';}else{ echo ' ฿';} } ?></h4> </div>
          </div>
          <br>
          <div class="row"> 
            <div class="col-8"></div>  
            <div class="col-2"><h4>Total</h4></div>    
            <div class="col-2" style="text-align: right;"><h4 id="summary"><?=  number_format(($this->cart->total()-$_SESSION['discount'])+$_SESSION['shippingCost'], 2, '.', ''); if($_SESSION['currencyType'] == 'USD'){ echo ' $';}else{ echo ' ฿';}  ?></h4></div>
          </div> 

        <?php
        }
      }?>



          <br>
          <div class="row"> 
            <?php if(isset($_SESSION['userType'])){
              if($_SESSION['userType'] == 'administrator'){?>
                  <!-- <div class="col-2"><a href="<?php echo base_url(); ?>loaddatatable" class="btn btn-success " style="width :120px;">Back</a> </div>   -->
                  <div class="col-2"><a href="<?php echo base_url(); ?>loaddatatable/" class="btn btn-success " style="width :120px;">Back</a> </div> 
              <?php }else{  ?>
                <div class="col-2"><a href="<?php echo base_url(); ?>loaddatatable/customer/<?php echo $_SESSION['costType_url']?>" class="btn btn-success " style="width :120px;">Back</a> </div>  
              <?php }} ?>
            <div class="col-7"></div>
 
            <?php if(isset($_SESSION['userType'])){

            if($_SESSION['userType'] == 'administrator'){?>
            <div id="divTotal">
                <div class="col-3"><a href="excel/fairtex-invoice.xlsx" class="btn btn-success" style="width :140px;"> Export Invoice.</a></div>
            </div>
                <?php

                    // mockup data by json file ex. you can use retrive data from db.
                    $json = file_get_contents('employee.json');
                    $employees = json_decode($json, true);

                    $spreadsheet = new Spreadsheet();
                    $sheet = $spreadsheet->getActiveSheet();

                    $fullDate = $_SESSION['fullDate'];
                    $invoceNo = $_SESSION['invoceNo'];
                    //$newEmail = $_SESSION['newEmail'];
                    //$newTel = $_SESSION['newTel'];
                    $customerName = $_SESSION['customerName'];
                    $customerAddress = $_SESSION['customerAddress'];
                    
                    $total = 0;
                    $subTotal = 0;
                    $vat = 0;
                    $vat_count = 0;
                    $price2_detail = 0;
                    $price2 = 0;
                    $shippingCost = 0;
                    $discount = 0;
                    $costType = "";

                    $invoiceTemp = $this->product_model->getInvoiceTemp($invoceNo); 
                    if(isset($invoiceTemp[0])){
                      if($invoiceTemp[0]->invoice_no != ""){ 
                        $discount =  $invoiceTemp[0]->invoice_discount;  
                        $shippingCost = $invoiceTemp[0]->invoice_shipping_cost; 
                         
                        $total =  $invoiceTemp[0]->total;
                        $subTotal =   $invoiceTemp[0]->sub_total;//number_format($this->cart->total(), 2, '.', '');
                        $vat =  $invoiceTemp[0]->vat;
                        $vat_count =  $invoiceTemp[0]->invoice_vat_count;

                        $price2_detail = $invoiceTemp[0]->invoice_price2_detail;
                        $price2 = $invoiceTemp[0]->invoice_price2;
                        $customerName = $invoiceTemp[0]->invoice_consignee;
                        $customerAddress = $invoiceTemp[0]->invoice_ship_to;
                        $costType = $invoiceTemp[0]->costType;
                      }
                    }
                    

                    $dataInvoice = array(
                      'invoice_no' => $invoceNo, 
                      'invoice_consignee' => $customerName, 
                      'invoice_ship_to' => $customerAddress, 
                      'invoice_by' => $customerName, 
                      'invoice_sub_total' => $subTotal,
                      'invoice_discount' => $discount,
                      'invoice_shipping_cost' => $shippingCost,
                      'invoice_total' => $total,
                      'typeCose' => $costType,
                      'invoice_currency_code' => $_SESSION['currencyType'],
                      'invoice_status' => 'draft',
                      'createdDate' => 'NOW()'   
                  ); 
          
                  $this->checkout_model->saveInvoice($dataInvoice,$invoceNo);
          
                  $this->checkout_model->deleteInvoiceDetail($invoceNo);
           
                  foreach ($this->cart->contents() as $items){
          
                      $dataInvoiceDetail = array(
                          'product_invoice_no' => $invoceNo, 
                          'product_name' => $items['name'], 
                          'product_description' => $items['name'], 
                          'product_size' => $items['options']['size'], 
                          'product_color' => $items['options']['color'],
                          'product_qty' => $items['qty'], 
                          'product_unit_price' => $items['price'], 
                          'product_amount' => $items['subtotal']
                      ); 
              
                      $this->checkout_model->saveInvoiceDetail($dataInvoiceDetail,$invoceNo);
                  }

                  if(isset($_SESSION['oldInvoiceNo'])){
                    $this->checkout_model->deleteInvoice($_SESSION['oldInvoiceNo']);
                    $this->checkout_model->deleteDetail($_SESSION['oldInvoiceNo']);
                  }
                    // header
                    // $spreadsheet->getActiveSheet()->setCellValue('A1', 'รหัสพนักงาน')
                    //     ->setCellValue('B1', 'ชื่อ')
                    //     ->setCellValue('C1', 'นามสกุล')
                    //     ->setCellValue('D1', 'อีเมล์')
                    //     ->setCellValue('E1', 'เพศ')
                    //     ->setCellValue('F1', 'เงินเดือน')
                    //     ->setCellValue('G1', 'เบอร์โทรศัพท์');

                    $imagelink = APPPATH.'logo/Fairtex-shop.png';
                    $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\HeaderFooterDrawing();

                    $spreadsheet->getActiveSheet()->getRowDimension('A1')->setRowHeight(80);
                    $drawing->setName('logo');
                    $drawing->setPath($imagelink); 
                        //setOffsetX works properly
                    $drawing->setOffsetX(15); 
                    $drawing->setOffsetY(15);                
                    //set width, height
                    $drawing->setWidth(280); 
                    $drawing->setHeight(100); 
                    $drawing->setCoordinates('A1');   
                    $drawing->setWorksheet($spreadsheet->getActiveSheet());
                    $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                 
                    //$spreadsheet->getActiveSheet()->setCellValue('F1', 'FAIRTEX EQUIPMENT CO.,LTD.')
                    $spreadsheet->getActiveSheet()->setCellValue('F1', 'FAIRTEX EQUIPMENT CO.,LTD.')
                        ->setCellValue('F2', '99/5, MOO3, SOI BOONTHAMANUSORN')
                        ->setCellValue('F3', 'THEPARAK RD.,BANGPLEEYAI, BANGPLEE,')
                        ->setCellValue('F4', 'SAMUTPRAKARN 10540, THAILAND')
                        ->setCellValue('F5', 'TEL (662)3855148,3855149   FAX(662)3855403') 
                        ->setCellValue('A7', 'CONSIGNEE:') 
                        ->setCellValue('B7', $customerName) 
                        ->setCellValue('C7', 'SHIP TO : ') 
                        ->setCellValue('D7', $customerAddress) 
                        ->setCellValue('E8', 'Invoice No : ') 
                        ->setCellValue('F8', $invoceNo) 
                        ->setCellValue('E9', 'Date : ') 
                        ->setCellValue('F9', $fullDate) 
                        ->setCellValue('E12', 'OUR REF  : ') 
                        ->setCellValue('A15', 'FREIGHT CHARGE : FREIGHT COLLECT') 
                        ->setCellValue('A17', 'TERM OF SALE : FOB (BANGKOK)	') 
                        ->setCellValue('C17', 'TO: ') 
                        ->setCellValue('E17', 'FROM :   BANGKOK, THAILAND	') 

                        ->setCellValue('A20', 'SKU#')
                        ->setCellValue('B20', 'Description')
                        ->setCellValue('C20', 'Size')
                        ->setCellValue('D20', 'Color')
                        ->setCellValue('E20', 'Qty.')
                        ->setCellValue('F20', 'UNIT PRICE')
                        ->setCellValue('G20', 'AMOUNT (USD)');
                        ;

                        $spreadsheet->getActiveSheet()->getStyle('A20')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                        $spreadsheet->getActiveSheet()->getStyle('B20')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                        $spreadsheet->getActiveSheet()->getStyle('C20')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                        $spreadsheet->getActiveSheet()->getStyle('D20')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                        $spreadsheet->getActiveSheet()->getStyle('E20')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                        $spreadsheet->getActiveSheet()->getStyle('F20')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                        $spreadsheet->getActiveSheet()->getStyle('G20')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

 
                    foreach(range('A','B') as $columnID) {
                      $spreadsheet->getActiveSheet()->getColumnDimension($columnID)
                          ->setAutoSize(true);
                  }

                    $spreadsheet->getActiveSheet()->getStyle("F1:F2")->getFont()->setSize(14);
                    $spreadsheet->getActiveSheet()->getStyle("F3:F4")->getFont()->setSize(14);
                    $spreadsheet->getActiveSheet()->getStyle("F5:A7")->getFont()->setSize(14);
                    $spreadsheet->getActiveSheet()->getStyle("C7:E8")->getFont()->setSize(14);
                    $spreadsheet->getActiveSheet()->getStyle("E9:E12")->getFont()->setSize(14);
                    $spreadsheet->getActiveSheet()->getStyle("A15:A17")->getFont()->setSize(14);
                    $spreadsheet->getActiveSheet()->getStyle("C17:E17")->getFont()->setSize(14);
                    $spreadsheet->getActiveSheet()->getStyle("A20:B20")->getFont()->setSize(14);
                    $spreadsheet->getActiveSheet()->getStyle("C20:D20")->getFont()->setSize(14);
                    $spreadsheet->getActiveSheet()->getStyle("E20:F20")->getFont()->setSize(14);
                    $spreadsheet->getActiveSheet()->getStyle("A7:G20")->getFont()->setSize(14);

                    $spreadsheet->getActiveSheet()->getStyle('F1')->getFont()->setBold( true );
                    $spreadsheet->getActiveSheet()->getStyle('F2')->getFont()->setBold( true );
                    $spreadsheet->getActiveSheet()->getStyle('F3')->getFont()->setBold( true );
                    $spreadsheet->getActiveSheet()->getStyle('F4')->getFont()->setBold( true );
                    $spreadsheet->getActiveSheet()->getStyle('F5')->getFont()->setBold( true );
                    $spreadsheet->getActiveSheet()->getStyle('A7')->getFont()->setBold( true );
                    $spreadsheet->getActiveSheet()->getStyle('C7')->getFont()->setBold( true );
                    $spreadsheet->getActiveSheet()->getStyle('E8')->getFont()->setBold( true );
                    $spreadsheet->getActiveSheet()->getStyle('E9')->getFont()->setBold( true );
                    $spreadsheet->getActiveSheet()->getStyle('E12')->getFont()->setBold( true );
                    $spreadsheet->getActiveSheet()->getStyle('A15')->getFont()->setBold( true );
                    $spreadsheet->getActiveSheet()->getStyle('A17')->getFont()->setBold( true ); 
                    $spreadsheet->getActiveSheet()->getStyle('C17')->getFont()->setBold( true ); 
                    $spreadsheet->getActiveSheet()->getStyle('E17')->getFont()->setBold( true ); 
                    $spreadsheet->getActiveSheet()->getStyle('A20')->getFont()->setBold( true ); 
                    $spreadsheet->getActiveSheet()->getStyle('B20')->getFont()->setBold( true );
                    $spreadsheet->getActiveSheet()->getStyle('C20')->getFont()->setBold( true );
                    $spreadsheet->getActiveSheet()->getStyle('D20')->getFont()->setBold( true );
                    $spreadsheet->getActiveSheet()->getStyle('E20')->getFont()->setBold( true );
                    $spreadsheet->getActiveSheet()->getStyle('F20')->getFont()->setBold( true );
                    $spreadsheet->getActiveSheet()->getStyle('G20')->getFont()->setBold( true );




                    $rowCount = 21;
                    foreach ($this->cart->contents() as $items){
                        $spreadsheet->getActiveSheet()->SetCellValue('A'.$rowCount, $items['name']);
                        $spreadsheet->getActiveSheet()->SetCellValue('B'.$rowCount, $items['name']);
                        $spreadsheet->getActiveSheet()->SetCellValue('C'.$rowCount, $items['options']['size']);
                        $spreadsheet->getActiveSheet()->SetCellValue('D'.$rowCount, $items['options']['color']);
                        $spreadsheet->getActiveSheet()->SetCellValue('E'.$rowCount, $items['qty']);
                        $spreadsheet->getActiveSheet()->SetCellValue('F'.$rowCount, $items['price']);
                        $spreadsheet->getActiveSheet()->SetCellValue('G'.$rowCount, number_format($items['subtotal']));
                        
                        $spreadsheet->getActiveSheet()->getStyle('G'.$rowCount)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);

                        
                        $rowCount++;
                    }

                    $currencyType = "";

                    if($_SESSION['currencyType'] == 'USD'){
                        $currencyType = ' $';
                    }else{
                        $currencyType = ' ฿';
                    }
 
                    
                    $spreadsheet->getActiveSheet()->SetCellValue('F'.($rowCount+2), 'Sub total');
                    $spreadsheet->getActiveSheet()->getStyle('F'.($rowCount+2))->getFont()->setSize(14);
                    $spreadsheet->getActiveSheet()->getStyle('F'.($rowCount+2))->getFont()->setBold( true );
                    $spreadsheet->getActiveSheet()->SetCellValue('G'.($rowCount+2), number_format($subTotal).$currencyType);
                    $spreadsheet->getActiveSheet()->getStyle('G'.($rowCount+2))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);

            
                    $spreadsheet->getActiveSheet()->SetCellValue('F'.($rowCount+3), 'Discount');
                    $spreadsheet->getActiveSheet()->getStyle('F'.($rowCount+3))->getFont()->setSize(14);
                    $spreadsheet->getActiveSheet()->getStyle('F'.($rowCount+3))->getFont()->setBold( true );
                    $spreadsheet->getActiveSheet()->SetCellValue('G'.($rowCount+3), number_format($discount) .$currencyType);
                    $spreadsheet->getActiveSheet()->getStyle('G'.($rowCount+3))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);

            
                    $spreadsheet->getActiveSheet()->SetCellValue('F'.($rowCount+4), 'shipping');
                    $spreadsheet->getActiveSheet()->getStyle('F'.($rowCount+4))->getFont()->setSize(14);
                    $spreadsheet->getActiveSheet()->getStyle('F'.($rowCount+4))->getFont()->setBold( true );
                    $spreadsheet->getActiveSheet()->SetCellValue('G'.($rowCount+4), number_format($shippingCost) .$currencyType);
                    $spreadsheet->getActiveSheet()->getStyle('G'.($rowCount+4))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
 
                   
                    $spreadsheet->getActiveSheet()->SetCellValue('F'.($rowCount+5), $price2_detail);
                    $spreadsheet->getActiveSheet()->getStyle('F'.($rowCount+5))->getFont()->setSize(14);
                    $spreadsheet->getActiveSheet()->getStyle('F'.($rowCount+5))->getFont()->setBold( true );
                    $spreadsheet->getActiveSheet()->SetCellValue('G'.($rowCount+5), number_format($price2));
                    $spreadsheet->getActiveSheet()->getStyle('G'.($rowCount+5))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
 
                    $spreadsheet->getActiveSheet()->SetCellValue('F'.($rowCount+6), 'Vat '. $vat . '%');
                    $spreadsheet->getActiveSheet()->getStyle('F'.($rowCount+6))->getFont()->setSize(14);
                    $spreadsheet->getActiveSheet()->getStyle('F'.($rowCount+6))->getFont()->setBold( true );
                    $spreadsheet->getActiveSheet()->SetCellValue('G'.($rowCount+6), number_format($vat_count).$currencyType);
                    $spreadsheet->getActiveSheet()->getStyle('G'.($rowCount+6))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);

                    $spreadsheet->getActiveSheet()->SetCellValue('F'.($rowCount+7), 'Total');
                    $spreadsheet->getActiveSheet()->getStyle('F'.($rowCount+7))->getFont()->setSize(14);
                    $spreadsheet->getActiveSheet()->getStyle('F'.($rowCount+7))->getFont()->setBold( true );
                    $spreadsheet->getActiveSheet()->SetCellValue('G'.($rowCount+7), number_format($total).$currencyType);
                    $spreadsheet->getActiveSheet()->getStyle('G'.($rowCount+7))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);


                    $spreadsheet->getActiveSheet()->SetCellValue('A'.($rowCount+9), 'BRAND : FAIRTEX');
                    $spreadsheet->getActiveSheet()->getStyle('F'.($rowCount+9))->getFont()->setSize(14);
                    $spreadsheet->getActiveSheet()->getStyle('F'.($rowCount+9))->getFont()->setBold( true );
                    
                    // cell value
                    // $spreadsheet->getActiveSheet()->fromArray($employees, null, 'A30');

                    // // style
                    // $last_row = count($employees) + 1;
                    // $spreadsheet->getActiveSheet()->getStyle('F2:F' . $last_row)
                    //     ->getNumberFormat()
                    //     ->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);

                    // $spreadsheet->getActiveSheet()->getStyle('G1:G'.$last_row)->getNumberFormat()
                    //     ->setFormatCode('0000000000');

                    // $spreadsheet->getActiveSheet()->getStyle('A1:G1')->getFont()->setBold(true);

                    // foreach(range('A','G') as $columnID) {
                    //     $spreadsheet->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
                    // }

                    $writer = new Xlsx($spreadsheet);

                    // save file to server and create link
                    $writer->save('excel/fairtex-invoice.xlsx');
                    
                
                ?>




            <?php }else{?>  
               <div class="col-2"><a href="excel/fairtex-invoice.xlsx" class="btn btn-success" style="width :120px;">Sent order.</a></div>
               <?php

                    // mockup data by json file ex. you can use retrive data from db.
                    $json = file_get_contents('employee.json');
                    $employees = json_decode($json, true);

                    $spreadsheet = new Spreadsheet();
                    $sheet = $spreadsheet->getActiveSheet();

                    $fullDate = $_SESSION['fullDate'];
                    $invoceNo = $_SESSION['invoceNo'];
                    //$newEmail = $_SESSION['newEmail'];
                    //$newTel = $_SESSION['newTel'];
                    $customerName = $_SESSION['customerName'];
                    $customerAddress = $_SESSION['customerAddress'];

                    $total = 0;
                    $subTotal = 0;
                    $vat = 0;
                    $vat_count = 0;
                    $price2_detail = 0;
                    $price2 = 0;
                    $shippingCost = 0;
                    $discount = 0;
                    $costType = "";

                    $invoiceTemp = $this->product_model->getInvoiceTemp($invoceNo); 
                    if(isset($invoiceTemp[0])){
                      if($invoiceTemp[0]->invoice_no != ""){ 
                        $discount =  $invoiceTemp[0]->invoice_discount;  
                        $shippingCost = $invoiceTemp[0]->invoice_shipping_cost; 
                        
                        $total =  $invoiceTemp[0]->total;
                        $subTotal =   $invoiceTemp[0]->sub_total;//number_format($this->cart->total(), 2, '.', '');
                        $vat =  $invoiceTemp[0]->vat;
                        $vat_count =  $invoiceTemp[0]->invoice_vat_count;

                        $price2_detail = $invoiceTemp[0]->invoice_price2_detail;
                        $price2 = $invoiceTemp[0]->invoice_price2;
                        $customerName = $invoiceTemp[0]->invoice_consignee;
                        $customerAddress = $invoiceTemp[0]->invoice_ship_to;
                        $costType = $invoiceTemp[0]->costType;
                      }
                    }


                    $dataInvoice = array(
                      'invoice_no' => $invoceNo, 
                      'invoice_consignee' => $customerName, 
                      'invoice_ship_to' => $customerAddress, 
                      'invoice_by' => $customerName, 
                      'invoice_sub_total' => $subTotal,
                      'invoice_discount' => $discount,
                      'invoice_shipping_cost' => $shippingCost,
                      'invoice_total' => $total,
                      'typeCose' => $costType,
                      'invoice_currency_code' => $_SESSION['currencyType'],
                      'invoice_status' => 'draft',
                      'createdDate' => 'NOW()'   
                    ); 

                    $this->checkout_model->saveInvoice($dataInvoice,$invoceNo);

                    $this->checkout_model->deleteInvoiceDetail($invoceNo);

                    foreach ($this->cart->contents() as $items){

                      $dataInvoiceDetail = array(
                          'product_invoice_no' => $invoceNo, 
                          'product_name' => $items['name'], 
                          'product_description' => $items['name'], 
                          'product_size' => $items['options']['size'], 
                          'product_color' => $items['options']['color'],
                          'product_qty' => $items['qty'], 
                          'product_unit_price' => $items['price'], 
                          'product_amount' => $items['subtotal']
                      ); 

                      $this->checkout_model->saveInvoiceDetail($dataInvoiceDetail,$invoceNo);
                    }

                    if(isset($_SESSION['oldInvoiceNo'])){
                    $this->checkout_model->deleteInvoice($_SESSION['oldInvoiceNo']);
                    $this->checkout_model->deleteDetail($_SESSION['oldInvoiceNo']);
                    }
                    // header
                    // $spreadsheet->getActiveSheet()->setCellValue('A1', 'รหัสพนักงาน')
                    //     ->setCellValue('B1', 'ชื่อ')
                    //     ->setCellValue('C1', 'นามสกุล')
                    //     ->setCellValue('D1', 'อีเมล์')
                    //     ->setCellValue('E1', 'เพศ')
                    //     ->setCellValue('F1', 'เงินเดือน')
                    //     ->setCellValue('G1', 'เบอร์โทรศัพท์');

                    $imagelink = APPPATH.'logo/Fairtex-shop.png';
                    $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\HeaderFooterDrawing();

                    $spreadsheet->getActiveSheet()->getRowDimension('A1')->setRowHeight(80);
                    $drawing->setName('logo');
                    $drawing->setPath($imagelink); 
                        //setOffsetX works properly
                    $drawing->setOffsetX(15); 
                    $drawing->setOffsetY(15);                
                    //set width, height
                    $drawing->setWidth(280); 
                    $drawing->setHeight(100); 
                    $drawing->setCoordinates('A1');   
                    $drawing->setWorksheet($spreadsheet->getActiveSheet());
                    $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);


                    //$spreadsheet->getActiveSheet()->setCellValue('F1', 'FAIRTEX EQUIPMENT CO.,LTD.')
                    $spreadsheet->getActiveSheet()->setCellValue('F1', 'FAIRTEX EQUIPMENT CO.,LTD.')
                        ->setCellValue('F2', '99/5, MOO3, SOI BOONTHAMANUSORN')
                        ->setCellValue('F3', 'THEPARAK RD.,BANGPLEEYAI, BANGPLEE,')
                        ->setCellValue('F4', 'SAMUTPRAKARN 10540, THAILAND')
                        ->setCellValue('F5', 'TEL (662)3855148,3855149   FAX(662)3855403') 
                        ->setCellValue('A7', 'CONSIGNEE:') 
                        ->setCellValue('B7', $customerName) 
                        ->setCellValue('C7', 'SHIP TO : ') 
                        ->setCellValue('D7', $customerAddress) 
                        ->setCellValue('E8', 'Invoice No : ') 
                        ->setCellValue('F8', $invoceNo) 
                        ->setCellValue('E9', 'Date : ') 
                        ->setCellValue('F9', $fullDate) 
                         
                        ->setCellValue('A12', 'SKU#')
                        ->setCellValue('B12', 'Description')
                        ->setCellValue('C12', 'Size')
                        ->setCellValue('D12', 'Color')
                        ->setCellValue('E12', 'Qty.')
                        ->setCellValue('F12', 'UNIT PRICE')
                        ->setCellValue('G12', 'AMOUNT (USD)');
                        ;

                        $spreadsheet->getActiveSheet()->getStyle('A12')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                        $spreadsheet->getActiveSheet()->getStyle('B12')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                        $spreadsheet->getActiveSheet()->getStyle('C12')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                        $spreadsheet->getActiveSheet()->getStyle('D12')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                        $spreadsheet->getActiveSheet()->getStyle('E12')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                        $spreadsheet->getActiveSheet()->getStyle('F12')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                        $spreadsheet->getActiveSheet()->getStyle('G12')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);


                    foreach(range('A','B') as $columnID) {
                      $spreadsheet->getActiveSheet()->getColumnDimension($columnID)
                          ->setAutoSize(true);
                    }

                    $spreadsheet->getActiveSheet()->getStyle("F1:F2")->getFont()->setSize(14);
                    $spreadsheet->getActiveSheet()->getStyle("F3:F4")->getFont()->setSize(14);
                    $spreadsheet->getActiveSheet()->getStyle("F5:A7")->getFont()->setSize(14);
                    $spreadsheet->getActiveSheet()->getStyle("C7:E8")->getFont()->setSize(14);
                    $spreadsheet->getActiveSheet()->getStyle("E9")->getFont()->setSize(14);
                    $spreadsheet->getActiveSheet()->getStyle("A12:B12")->getFont()->setSize(14);
                    $spreadsheet->getActiveSheet()->getStyle("C12:D12")->getFont()->setSize(14);
                    $spreadsheet->getActiveSheet()->getStyle("E12:F12")->getFont()->setSize(14);
                    $spreadsheet->getActiveSheet()->getStyle("A7:G12")->getFont()->setSize(14);

                    $spreadsheet->getActiveSheet()->getStyle('F1')->getFont()->setBold( true );
                    $spreadsheet->getActiveSheet()->getStyle('F2')->getFont()->setBold( true );
                    $spreadsheet->getActiveSheet()->getStyle('F3')->getFont()->setBold( true );
                    $spreadsheet->getActiveSheet()->getStyle('F4')->getFont()->setBold( true );
                    $spreadsheet->getActiveSheet()->getStyle('F5')->getFont()->setBold( true );
                    $spreadsheet->getActiveSheet()->getStyle('A7')->getFont()->setBold( true );
                    $spreadsheet->getActiveSheet()->getStyle('C7')->getFont()->setBold( true );
                    $spreadsheet->getActiveSheet()->getStyle('E8')->getFont()->setBold( true );
                    $spreadsheet->getActiveSheet()->getStyle('E9')->getFont()->setBold( true );
                    $spreadsheet->getActiveSheet()->getStyle('A12')->getFont()->setBold( true ); 
                    $spreadsheet->getActiveSheet()->getStyle('B12')->getFont()->setBold( true );
                    $spreadsheet->getActiveSheet()->getStyle('C12')->getFont()->setBold( true );
                    $spreadsheet->getActiveSheet()->getStyle('D12')->getFont()->setBold( true );
                    $spreadsheet->getActiveSheet()->getStyle('E12')->getFont()->setBold( true );
                    $spreadsheet->getActiveSheet()->getStyle('F12')->getFont()->setBold( true );
                    $spreadsheet->getActiveSheet()->getStyle('G12')->getFont()->setBold( true );




                    $rowCount = 13;
                    foreach ($this->cart->contents() as $items){
                        $spreadsheet->getActiveSheet()->SetCellValue('A'.$rowCount, $items['name']);
                        $spreadsheet->getActiveSheet()->SetCellValue('B'.$rowCount, $items['name']);
                        $spreadsheet->getActiveSheet()->SetCellValue('C'.$rowCount, $items['options']['size']);
                        $spreadsheet->getActiveSheet()->SetCellValue('D'.$rowCount, $items['options']['color']);
                        $spreadsheet->getActiveSheet()->SetCellValue('E'.$rowCount, $items['qty']);
                        $spreadsheet->getActiveSheet()->SetCellValue('F'.$rowCount, $items['price']);
                        $spreadsheet->getActiveSheet()->SetCellValue('G'.$rowCount, number_format($items['subtotal']));
                        
                        $spreadsheet->getActiveSheet()->getStyle('G'.$rowCount)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);

                        
                        $rowCount++;
                    }

                    $currencyType = "";

                    if($_SESSION['currencyType'] == 'USD'){
                        $currencyType = ' $';
                    }else{
                        $currencyType = ' ฿';
                    }


                    $spreadsheet->getActiveSheet()->SetCellValue('F'.($rowCount+2), 'Sub total');
                    $spreadsheet->getActiveSheet()->getStyle('F'.($rowCount+2))->getFont()->setSize(14);
                    $spreadsheet->getActiveSheet()->getStyle('F'.($rowCount+2))->getFont()->setBold( true );
                    $spreadsheet->getActiveSheet()->SetCellValue('G'.($rowCount+2), number_format($subTotal).$currencyType);
                    $spreadsheet->getActiveSheet()->getStyle('G'.($rowCount+2))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);


                    $spreadsheet->getActiveSheet()->SetCellValue('F'.($rowCount+3), 'Discount');
                    $spreadsheet->getActiveSheet()->getStyle('F'.($rowCount+3))->getFont()->setSize(14);
                    $spreadsheet->getActiveSheet()->getStyle('F'.($rowCount+3))->getFont()->setBold( true );
                    $spreadsheet->getActiveSheet()->SetCellValue('G'.($rowCount+3), number_format($discount) .$currencyType);
                    $spreadsheet->getActiveSheet()->getStyle('G'.($rowCount+3))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);


                    $spreadsheet->getActiveSheet()->SetCellValue('F'.($rowCount+4), 'shipping');
                    $spreadsheet->getActiveSheet()->getStyle('F'.($rowCount+4))->getFont()->setSize(14);
                    $spreadsheet->getActiveSheet()->getStyle('F'.($rowCount+4))->getFont()->setBold( true );
                    $spreadsheet->getActiveSheet()->SetCellValue('G'.($rowCount+4), number_format($shippingCost) .$currencyType);
                    $spreadsheet->getActiveSheet()->getStyle('G'.($rowCount+4))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);


                    $spreadsheet->getActiveSheet()->SetCellValue('F'.($rowCount+5), $price2_detail);
                    $spreadsheet->getActiveSheet()->getStyle('F'.($rowCount+5))->getFont()->setSize(14);
                    $spreadsheet->getActiveSheet()->getStyle('F'.($rowCount+5))->getFont()->setBold( true );
                    $spreadsheet->getActiveSheet()->SetCellValue('G'.($rowCount+5), number_format($price2));
                    $spreadsheet->getActiveSheet()->getStyle('G'.($rowCount+5))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);

                    $spreadsheet->getActiveSheet()->SetCellValue('F'.($rowCount+6), 'Vat 7 ' . '%');
                    $spreadsheet->getActiveSheet()->getStyle('F'.($rowCount+6))->getFont()->setSize(14);
                    $spreadsheet->getActiveSheet()->getStyle('F'.($rowCount+6))->getFont()->setBold( true );
                    $spreadsheet->getActiveSheet()->SetCellValue('G'.($rowCount+6), number_format($vat_count).$currencyType);
                    $spreadsheet->getActiveSheet()->getStyle('G'.($rowCount+6))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);

                    $spreadsheet->getActiveSheet()->SetCellValue('F'.($rowCount+7), 'Total');
                    $spreadsheet->getActiveSheet()->getStyle('F'.($rowCount+7))->getFont()->setSize(14);
                    $spreadsheet->getActiveSheet()->getStyle('F'.($rowCount+7))->getFont()->setBold( true );
                    $spreadsheet->getActiveSheet()->SetCellValue('G'.($rowCount+7), number_format($total).$currencyType);
                    $spreadsheet->getActiveSheet()->getStyle('G'.($rowCount+7))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);


                    $spreadsheet->getActiveSheet()->SetCellValue('A'.($rowCount+9), 'BRAND : FAIRTEX');
                    $spreadsheet->getActiveSheet()->getStyle('F'.($rowCount+9))->getFont()->setSize(14);
                    $spreadsheet->getActiveSheet()->getStyle('F'.($rowCount+9))->getFont()->setBold( true );

                    $writer = new Xlsx($spreadsheet);

                    // save file to server and create link
                    $writer->save('excel/fairtex-invoice.xlsx');


                    ?>
            <?php }}?>

            <!-?php echo $_SESSION["test"] ?-->
          </div>
      </form>
          
        <!-- <div class="row"> 
            <div class="col-12">
                <div class="input-group">
                    <textarea class="form-control" rows="4" id="condign"></textarea>
                    <textarea class="form-control" rows="4" id="shipto"></textarea>  
                    <textarea class="form-control" rows="4" id="shipto"></textarea>  
                </div>
            </div>  
        </div> -->
    </div>
    
 
  <section>


  
  <div class="container page-section portfolio"> 
    <!-- <div class="row"> -->  
    <div class="container ">
         
    </div>
  </div>
  
 <!-- Footer -->
 <footer class="footer text-center bg">
    <div class="container">
      <div class="row">

        <!-- Footer Location -->
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h5 class="text-uppercase mb-4">Fairtex Equipment Co.,Ltd</h5>
          <p class="lead mb-0">99/5 Moo3 Soi Boonthamanusorn, Theparak Road, Bangpleeyai, Bangplee Samutprakarn 10540
		  	<br>Email: fairtexexport@gmail.com
			<br>Phone: (+662) 385-5149, 02-385-5148 / M (+663) 902-7176
			<br>Fax: (+662) 385-5403</p>
        </div>

        <!-- Footer Social Icons -->
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Around the Web</h4>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-facebook-f"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-twitter"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-linkedin-in"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-dribbble"></i>
          </a>
        </div>

        <!-- Footer About Text -->
        <div class="col-lg-4">
          <h4 class="text-uppercase mb-4">About</h4>
		   
        </div>

      </div>
    </div>
  </footer>

  <!-- Copyright Section -->
  <section class="copyright py-4 text-center text-white">
    <div class="container">
      <small>Copyright &copy; Your Website 2019</small>
    </div>
  </section>

  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
  <div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
      <i class="fa fa-chevron-up"></i>
    </a>
  </div>
 

  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="<?php echo base_url(); ?>assets/js/jqBootstrapValidation.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="<?php echo base_url(); ?>assets/js/freelancer.min.js"></script>
 
  <script>   
 
    $(document).ready(function(){
     
      // Save data
      $(".edit").focusout(function(e){
        var rowid = $(this).attr('value')
        var qty =  document.getElementById(rowid).value;

        //alert(rowid);
  
          $.ajax({
           url: '<?php echo base_url(); ?>loaddatatable/updateCart',
           type: 'POST',
           data: {rowid : rowid,
                  qty : qty

            },
           error: function() {
              alert('Something is wrong');
           },
           success: function(response) { 
            location.reload();
                //$("#productTable").load(window.location + " #productTable");
           }
        }); 
      });

    });
    

    function totalFunction(){

      var total = document.getElementById("total").value;
      var discount = document.getElementById("discount").value;
      var shipping = document.getElementById("shipping").value;
      var invoice_consignee = document.getElementById("consigee").value;
      var invoice_ship_to = document.getElementById("shipTo").value;
      var costType = document.getElementById("costType").value;
      var currType = document.getElementById("currType").value;
 
     // var summary = document.getElementById("sum").value.replace(",", "");
      var summary = document.getElementById("total").value.replace(",", "");

      var vat =  document.getElementById("vat").value;
      var perc = 0;
 
      if(discount == ""){
        discount = 0;
      }

      if(shipping == ""){
        shipping = 0;
      }

      var sumInvoice = (parseInt(summary)-parseInt(discount))+parseInt(shipping);
        
        
      var price2 = document.getElementById("addPrice2").value.replace(",", "");

      var namePrice2 = document.getElementById("namePrice2").value;

      if(price2 == ""){
        price2 = 0;
      }else{
        sumInvoice = parseInt(sumInvoice)+parseInt(price2);
      }

      if(vat == ""){
          vat = 0;
      }else{
          perc =  (vat/100) * sumInvoice;
      }
  
      var headingDiv = document.getElementById("summary"); 
          headingDiv.innerHTML =  new Intl.NumberFormat().format(parseInt(sumInvoice)+parseInt(perc))+currType ;

        // $('#sum').val(sumInvoice); 
        $('#input').val(new Intl.NumberFormat().format(parseInt(perc))+currType); 

        //sessionStorage.setItem("lastname", "Smith");

        var invoiceNo = document.getElementById("invoiceNo").value;
        var total1 = parseInt(sumInvoice)+parseInt(perc);
        var sub_total = total;
  
        $.ajax({
           url: '<?php echo base_url(); ?>loaddatatable/setreport',
           type: 'POST',
           data: {
                invoiceNo : invoiceNo,
                discount : discount, 
                shipping : shipping,
                vat       : vat,
                price2 : price2,
                namePrice2 : namePrice2,
                invoice_vat_count   : parseInt(perc),
                total : parseInt(total1),
                sub_total : parseInt(sub_total),
                invoice_consignee : invoice_consignee,
                invoice_ship_to : invoice_ship_to,
                costType : costType
              },
           error: function() {
              alert('Something is wrong');
           },
           success: function(response) { 
             $("#divTotal").load(window.location + " #divTotal"); 
           }
 
        }); 
       
    } 

    function delCart(rowid){ 
        $.ajax({
           url: '<?php echo base_url(); ?>loaddatatable/removeCart',
           type: 'POST',
           data: {rowid : rowid },
           error: function() {
              alert('Something is wrong');
           },
           success: function(response) { 
            location.reload();
               // $("#productTable").load(window.location + " #productTable");
           }
        }); 
 
    } 

    // (".downloadLink").click(
    //     function(e) {   
    //         alert('XXX');
    //     }
    // );

    // function updateCard(rowid){
    //     alert("XXX "+ rowid);
    // }
  </script>
</body>
 

</html>
