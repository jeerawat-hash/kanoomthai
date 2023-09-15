<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.5.0/socket.io.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>

<div class="container-fluid mt-3">
  <h2 id="SocketStatus">Status</h2> 
  <div class="row text-center">
    <div class="col-8"> 
        <div class="row">
            <div class="col-12 text-center"> <h2>.... TableCustomer ....</h2> </div>  
        </div>
        <div class="row ">
            <div class="col-12">
                
                <div class="row">
                    <div class="col-3 mt-2">
                        <div class="card" style="width: 13rem;"> 
                            <div class="card-body">
                              <h5 class="card-title">โต๊ะ 1</h5>
                              <p class="card-text">-</p>
                              <button type="button" class="btn btn-primary position-relative">
                                Receive
                                <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle"></span>
                              </button>                             
                            </div>
                        </div>
                    </div>
                    <div class="col-3 mt-2">
                        <div class="card" style="width: 13rem;"> 
                            <div class="card-body">
                              <h5 class="card-title">โต๊ะ 2</h5>
                              <p class="card-text">-</p>
                              <button type="button" class="btn btn-primary position-relative">
                                Receive
                                <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle"></span>
                              </button> 
                            </div>
                        </div>
                    </div>
                    <div class="col-3 mt-2">
                        <div class="card" style="width: 13rem;"> 
                            <div class="card-body">
                              <h5 class="card-title">โต๊ะ 3</h5>
                              <p class="card-text">-</p>
                              <button type="button" class="btn btn-primary position-relative">
                                Receive
                                <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle"></span>
                              </button> 
                            </div>
                        </div>
                    </div> 
                    <div class="col-3 mt-2">
                        <div class="card" style="width: 13rem;"> 
                            <div class="card-body">
                              <h5 class="card-title">โต๊ะ 4</h5>
                              <p class="card-text">-</p>
                              <button type="button" class="btn btn-primary position-relative">
                                Receive
                                <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle"></span>
                              </button> 
                            </div>
                        </div>
                    </div> 
                    <div class="col-3 mt-2">
                        <div class="card" style="width: 13rem;"> 
                            <div class="card-body">
                              <h5 class="card-title">โต๊ะ 5</h5>
                              <p class="card-text">-</p>
                              <button type="button" class="btn btn-primary position-relative">
                                Receive
                                <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle"></span>
                              </button> 
                            </div>
                        </div>
                    </div> 
                    <div class="col-3 mt-2">
                        <div class="card" style="width: 13rem;"> 
                            <div class="card-body">
                              <h5 class="card-title">โต๊ะ 6</h5>
                              <p class="card-text">-</p>
                              <button type="button" class="btn btn-primary position-relative">
                                Receive
                                <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle"></span>
                              </button> 
                            </div>
                        </div>
                    </div> 
                    <div class="col-3 mt-2">
                        <div class="card" style="width: 13rem;"> 
                            <div class="card-body">
                              <h5 class="card-title">โต๊ะ 7</h5>
                              <p class="card-text">-</p>
                              <button type="button" class="btn btn-primary position-relative">
                                Receive
                                <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle"></span>
                              </button> 
                            </div>
                        </div>
                    </div> 
                    <div class="col-3 mt-2">
                        <div class="card" style="width: 13rem;"> 
                            <div class="card-body">
                              <h5 class="card-title">โต๊ะ 8</h5>
                              <p class="card-text">-</p>
                              <button type="button" class="btn btn-primary position-relative">
                                Receive
                                <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle"></span>
                              </button> 
                            </div>
                        </div>
                    </div> 
                    <div class="col-3 mt-2">
                        <div class="card" style="width: 13rem;"> 
                            <div class="card-body">
                              <h5 class="card-title">โต๊ะ 9</h5>
                              <p class="card-text">-</p>
                              <button type="button" class="btn btn-primary position-relative">
                                Receive
                                <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle"></span>
                              </button> 
                            </div>
                        </div>
                    </div> 
                    <div class="col-3 mt-2">
                        <div class="card" style="width: 13rem;"> 
                            <div class="card-body">
                              <h5 class="card-title">โต๊ะ 10</h5>
                              <p class="card-text">-</p>
                              <button type="button" class="btn btn-primary position-relative">
                                Receive
                                <span class="position-absolute top-0 start-100 translate-middle p-2 bg-success border border-light rounded-circle"></span>
                              </button> 
                            </div>
                        </div>
                    </div> 
                </div>

            
            </div>
        </div>
    </div>
    <div class="col-4">  
        <div class="row">
            <div class="col-12 text-center">.... DataStock ....</div>  
        </div> 
        <div class="row text-center">
            <div class="col-4">ชื่อ</div>
            <div class="col-4">10</div>
            <div class="col-4">หน่วย</div>
        </div>
    </div>
  </div> 
</div> 















<div class="container">
	 <div id="ContentMenu"></div>
</div>
 








</body>

<script>
 
</script>
</html>
