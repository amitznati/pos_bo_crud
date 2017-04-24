<script>
    var roles =  {!!$roles!!} ;

    @if(isset($employee))
        setPermissions({{$employee->roles()->first()->id}})
    @endif
    //Role selection changed
    $("input[name='role[]']").change(function(){
        setPermissions(this.value);
    });//End Role Selection changed

    function setPermissions(role_id)
    {
        $(':checkbox').each(function(i){
          $(this).attr("disabled", false);
          $(this).prop("checked", false);
        });
        var values = [];
        roles.forEach(function(role){
            if(role_id == role.id)
                role.permissions.forEach(function(permission){
                    $("#permissions").find('[value=' + permission.id + ']').attr("disabled", true);
                    $("#permissions").find('[value=' + permission.id + ']').prop("checked", false);
                });
        });
    }
    //Salery fields enable/disable
    var salery_disabled = $("input[name='add_salery']").prop('checked');
    $('#salery-div *').prop('disabled',!salery_disabled);
    $("input[name='add_salery']").change(function(){
        salery_disabled = $("input[name='add_salery']").prop('checked');
        $('#salery-div *').prop('disabled',!salery_disabled);
    });
    
</script>