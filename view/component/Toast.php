<?php
function toastPage($message)
{ ?>

    <div class="position-fixed top-0 start-50 translate-middle-x-md container-md" style="z-index: 100; top: 0; right: 30;">
        <div class="rounded p-3 col-6" style="position: absolute;  background-color:#eaeaea">
            <h6 class="toast-header fw-bolder">Thông báo</h6>
            <hr>
            <div class="toast-body">
                <?php echo $message ?>
            </div>
        </div>
    </div>

<?php } ?>