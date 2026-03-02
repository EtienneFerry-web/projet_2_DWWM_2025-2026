{if (isset($success_message))}
    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
        <div class="d-flex align-items-center gap-2 mb-1">
            <i class="bi bi-check-circle-fill fs-5"></i>
            <strong>Succès</strong>
        </div>
        <p class="mb-0 ms-4 ps-1 small">{$success_message}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

{elseif (count($arrError) > 0)}
    <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert">
        <div class="d-flex align-items-center gap-2 mb-1">
            <i class="bi bi-exclamation-triangle-fill fs-5"></i>
            <strong>Une erreur est survenue</strong>
        </div>
        <ul class="mb-0 ms-4 ps-1 small">
            {foreach from=$arrError item=strError}
                <li>{$strError}</li>
            {/foreach}
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
{/if}