<?php if (isset($component)) { $__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015 = $component; } ?>
<?php $component = App\View\Components\GuestLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\GuestLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="pt-4 bg-gray-100">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
            
            <div>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'jetstream::components.authentication-card-logo','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('jet-authentication-card-logo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>

            <div class="w-full sm:max-w-2xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose">
                <div class="bg-gray-100">
                    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-md rounded-lg p-6">
                            <h1 class="text-3xl font-semibold mb-6">Informativa sulla tutela dei dati personali ai sensi del Regolamento Europeo 2016/679 ("GDPR")</h1>
                            <p class="mb-4">
                                Gentile Utente, La informiamo che il trattamento dei dati personali da Lei forniti o comunque raccolti nell'ambito dell'utilizzo del presente sito web (il "Sito") sarà effettuato nel rispetto del Regolamento Europeo 2016/679 ("GDPR") e della normativa italiana in materia di protezione dei dati personali.
                            </p>
                            <h2 class="text-xl font-semibold mb-4">Titolare del trattamento</h2>
                            <p class="mb-4">
                                Il titolare del trattamento è [inserire il nome del titolare], con sede legale in [inserire l'indirizzo], P.IVA [inserire il numero di partita IVA], contattabile all'indirizzo email [inserire l'indirizzo email] o al numero di telefono [inserire il numero di telefono].
                            </p>
                            <h2 class="text-xl font-semibold mb-4">Finalità del trattamento</h2>
                            <p class="mb-4">
                                I dati personali forniti dall'utente mediante la compilazione dei form presenti sul Sito, nonché quelli raccolti automaticamente durante la navigazione, verranno trattati per le seguenti finalità:
                            </p>
                            <ul class="list-disc list-inside mb-4">
                                <li>Permettere la navigazione del Sito e la fruizione dei servizi offerti;</li>
                                <li>Svolgere attività di analisi e studio delle preferenze e dei comportamenti degli utenti al fine di migliorare la qualità del servizio offerto;</li>
                                <li>Comunicare agli utenti informazioni commerciali e promozionali relative ai propri prodotti e servizi.</li>
                            </ul>
                            <h2 class="text-xl font-semibold mb-4">Base giuridica del trattamento</h2>
                            <p class="mb-4">
                                Il trattamento dei dati personali dell'utente avviene sulla base del consenso espresso dall'utente stesso mediante l'invio dei form presenti

                            <p class="mb-4">
                                Inoltre, si precisa che il titolare del trattamento dei dati personali è tenuto a rispettare i diritti degli interessati previsti dal Regolamento Generale sulla Protezione dei Dati (RGPD) dell'Unione Europea, come il diritto di accesso, rettifica, cancellazione, limitazione, portabilità e opposizione al trattamento dei dati personali.
                            </p>
                            <p class="mb-4">
                                Infine, il titolare del trattamento si impegna a proteggere i dati personali degli utenti mediante l'adozione di misure tecniche e organizzative adeguate per prevenire la perdita, la divulgazione non autorizzata o l'accesso non autorizzato a tali dati.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015)): ?>
<?php $component = $__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015; ?>
<?php unset($__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015); ?>
<?php endif; ?>
<?php /**PATH /var/www/natan_blog/resources/views/policy.blade.php ENDPATH**/ ?>