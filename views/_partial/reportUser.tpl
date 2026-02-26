{if !empty($objReport->getTitle())}
    <li class="list-group-item d-flex justify-content-center align-items-center p-2">
        <a class="text-decoration-none col-4 text-dark fw-bold" href="{$smarty.env.BASE_URL}Movie/Movie?id={$objReport->getReportedMovieId()}">
           {$objReport->getTitle()}
        </a>
        <span class="col-4 text-center fw-bold">Raison : {$objReport->getReason()}</span>
        <span class="col-4 text-end fw-bold">{$objReport->getDeleteAt()}</span>
    </li>
{elseif !empty($objReport->getPseudo())}
    <li class="list-group-item d-flex justify-content-center align-items-center p-2">
        <a class="text-decoration-none col-4 text-dark fw-bold" href="{$smarty.env.BASE_URL}User/User?id={$objReport->getReportedUserId()}">
            {$objReport->getPseudo()}
        </a>
        <span class="col-4 text-center fw-bold">Raison : {$objReport->getReason()}</span>
        <span class="col-4 text-end fw-bold">{$objReport->getDeleteAt()}</span>
    </li>
{else}
    <li class="list-group-item d-flex justify-content-center align-items-center p-2">
        <a class="text-decoration-none col-4 text-dark fw-bold" href="{$smarty.env.BASE_URL}User/User?id={$objReport->getReportedUserId()}">
           Commentaire de : {$objReport->getPseudo()}
        </a>
        <span class="col-4 text-center fw-bold">{$objReport->getReason()}</span>
        <span class="col-4 text-end fw-bold">{$objReport->getDeleteAt()}</span>
    </li>
{/if}
