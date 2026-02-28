{extends file="views/layout_view.tpl"}

{block name="title" prepend}Contact{/block}

{block name="description"}Une question ? Contactez l'équipe de notre site de films !{/block}

{block name="content"}
    <section class="container py-5 my-auto">
        <h1 class="text-center">Contactez-nous</h1>
        <p class="mx-auto text-center py-2">
            Vous avez une suggestion ou vous avez repéré un bug sur un film ?
            Laissez-nous un message via le formulaire ci-dessous.
        </p>

        <form method="post">
            <input type="hidden" name="csrf_token" value="{$smarty.session.csrf_token}">
            <div class="row">
                <div class="col-md-6 form-group py-2">
                    <label class="form-label">Nom :</label>
                    <input type="text"
                           name="name"
                           class="form-control {if isset($arrError['name'])}is-invalid{/if}"
                           value="{if isset($smarty.session.user)}{$smarty.session.user.user_name|cat:' '|cat:$smarty.session.user.user_firstname}{/if}"
                           placeholder="Votre nom">
                    {if isset($arrError['name'])}<div class="invalid-feedback">{$arrError['name']}</div>{/if}
                </div>

                <div class="col-md-6 form-group py-2">
                    <label class="form-label">Email :</label>
                    <input type="email"
                           name="email"
                           class="form-control {if isset($arrError['email'])}is-invalid{/if}"
                           value="{$smarty.session.user.user_email|default:''}"
                           placeholder="votre@email.com">
                    {if isset($arrError['email'])}<div class="invalid-feedback">{$arrError['email']}</div>{/if}
                </div>
            </div>

            <div class="form-group py-2">
                <label class="form-label">Sujet du message :</label>
                <input type="text"
                       name="subject"
                       class="form-control {if isset($arrError['subject'])}is-invalid{/if}"
                       value=""
                       placeholder="Ex: Problème d'affichage, Suggestion de film...">
                {if isset($arrError['subject'])}<div class="invalid-feedback">{$arrError['subject']}</div>{/if}
            </div>

            <div class="form-group py-2">
                <label class="form-label">Message :</label>
                <textarea name="message"
                          rows="6"
                          class="form-control {if isset($arrError['message'])}is-invalid{/if}"
                          placeholder="Écrivez votre message ici..."></textarea>
                {if isset($arrError['message'])}<div class="invalid-feedback">{$arrError['message']}</div>{/if}
            </div>

            <div class="py-3">
                <input class="w-100 btnCustom py-2" type="submit" value="Envoyer le message">
            </div>
        </form>
    </section>
{/block}
