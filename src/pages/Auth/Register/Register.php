 <div class="container-auth">
     <div class="row auth-wrapper">
         <form class="validation" id="form-2">
             <div class="form-validation mt-2">
                 <div class="form-validation__header text-center d-flex justify-content-between align-items-center mb-5">
                     <img src="http://localhost/Book-movie-tickets/assets/images/logo.jpg" alt="">
                     <h5 class="form-validation__header-content fs-2 "><a href="http://localhost/Book-movie-tickets/alphacinemas.vn/login">Đăng nhập</a></h5>
                 </div>
             </div>
             <div class="form-validation__body mt-2">
                 <div class="mb-3">
                     <label for="formGroupExampleInput" class="form-label">Tên đầy đủ</label>
                     <input type="text" class="form-control form-control-lg" id="formName" name="userName" placeholder="VD: Hoàng Ngô">
                     <span class="form-message"></span>
                 </div>
                 <div class="mb-3">
                     <label for="formGroupExampleInput" class="form-label">Email</label>
                     <input type="email" class="form-control form-control-lg" id="formEmail" name="email" placeholder="VD: email@domain.com">
                     <span class="form-message"></span>
                 </div>
                 <div class="mb-3">
                     <label for="formGroupExampleInput" class="form-label">Mật khẩu</label>
                     <input type="password" class="form-control form-control-lg" id="formPassword" name="password" placeholder="Nhập mật khẩu">
                     <span class="form-message"></span>
                     <!-- <span class="check-password">
                      <input type="checkbox" class="checkbox-btn" value="off">
                      Hiện mật khẩu
                     </span>
                  </div> -->
                     <div class="mb-3">
                         <label for="formGroupExampleInput" class="form-label">Xác nhận mật khẩu</label>
                         <input type="password" class="form-control form-control-lg" id="formPasswordVerification" name="passwordConfirm" placeholder="Xác nhận mật khẩu">
                         <span class="form-message"></span>
                         <span class="check-password">
                             <input type="checkbox" class="checkbox-btn" value="off">
                             Hiện mật khẩu
                         </span>
                     </div>
                     <button type="submit" class="btn btn-success btn-lg fs-4">Đăng Kí</button>
                     <span class="form-message auth-message fs-4 valid"></span>
                 </div>
         </form>
     </div>
 </div>