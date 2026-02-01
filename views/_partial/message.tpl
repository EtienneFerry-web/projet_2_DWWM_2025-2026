

    {if (isset($success_message))}
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
                {$success_message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    {elseif (count($arrError) > 0)}
        <div class="alert alert-danger">
        {foreach from=$arrError item=strError}
            <p>{$strError}</p>
        {/foreach}
    </div>
    {/if}
    