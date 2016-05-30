<!-- Modal change avatar for user -->
<div class="modal fade mod_profile" id="change-avatar">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" ng-click="cancel()" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Change Avatar</h4>
    </div>
    <div class="modal-body">
        <div class="cropArea">
            <img-crop area-type="square" image="myImage" result-image="myCroppedImage"></img-crop>
        </div>
        <div class="center-block">
                <button type="button" class="btn btn-action" ng-click="changeAvatar()"><span class="glyphicon glyphicon-retweet"></span> Change Avatar</button>
                <button type="button" class="btn btn-default" ng-click="cancel()"><span class="glyphicon glyphicon-remove"></span> Close</button>
         </div>
    </div>
</div>
<!-- End modal change avatar for user -->