<div class="modal fade" id="modal_flexitests" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            {!! Form::open(['route' => ['backend.tests.save_flexitests', $test->id], 'id' => 'save_flexitests', 'role' => 'form', 'method' => 'post']) !!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Flexiteste</h4>
                    <button type="submit" class="btn btn-xs btn-primary pull-left">{{ trans('strings.save_button') }}</button>
                </div>
                <div class="modal-body">
                    @include('backend.tests.flexibilities.flexitests.includes.abduction_shoulders')
                    @include('backend.tests.flexibilities.flexitests.includes.lateral_trunk_flexion')
                    @include('backend.tests.flexibilities.flexitests.includes.leg_hyperextension')
                    @include('backend.tests.flexibilities.flexitests.includes.elbow_flexion')
                    @include('backend.tests.flexibilities.flexitests.includes.elbow_hyperextension')
                    @include('backend.tests.flexibilities.flexitests.includes.fist_flexion')
                    @include('backend.tests.flexibilities.flexitests.includes.fist_extension')
                    @include('backend.tests.flexibilities.flexitests.includes.horizontal_shoulder_abduction')
                    @include('backend.tests.flexibilities.flexitests.includes.hip_flexion')
                    @include('backend.tests.flexibilities.flexitests.includes.trunk_hyperextension')
                    @include('backend.tests.flexibilities.flexitests.includes.haunch_flexion')
                    @include('backend.tests.flexibilities.flexitests.includes.haunch_extension')
                    @include('backend.tests.flexibilities.flexitests.includes.leg_flexion')
                    @include('backend.tests.flexibilities.flexitests.includes.plantar_dorsiflexion')
                    @include('backend.tests.flexibilities.flexitests.includes.plantar_flexion')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">{{ trans('strings.cancel_button') }}</button>
                    <button type="submit" class="btn btn-primary">{{ trans('strings.save_button') }}</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>