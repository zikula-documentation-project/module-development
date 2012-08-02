<h3>{gt text="Modify person"}</h3>

{form cssClass="z-form"}
    {formvalidationsummary}

<fieldset>

    <div class="z-formrow">
        {formlabel for="name" __text='Name'}
            {formtextinput id="name" maxLength=255 mendatory=true}
    </div>

    <div class="z-formrow">
        {formlabel for="birthday" __text='Birthday'}
            {formdateinput id="birthday" medatory=true}
    </div>

</fieldset>

<div class="z-formbuttons z-buttons">
    {formbutton class="z-bt-ok" commandName="save" __text="Save"}
        {formbutton class="z-bt-cancel" commandName="cancel" __text="Cancel"}
</div>

{/form}