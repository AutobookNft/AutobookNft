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
                            <h1 class="text-3xl font-semibold mb-6">Termini e conduzioni di uso del servizio</h1>
                            <h2 class="text-xl font-semibold mb-4">Introduzione:</h2>
                            <p class="mb-4">
                                una breve introduzione che spiega il contenuto del documento e il suo scopo.
                            </p>
                            <h2 class="text-xl font-semibold mb-4">Accettazione dei termini:</h2>
                            <p class="mb-4">
                                una sezione che indica che l'utente accetta i termini di servizio utilizzando il sito web, l'applicazione o il servizio.
                            </p>
                            <h2 class="text-xl font-semibold mb-4">Modifiche ai termini di servizio:</h2>
                            <p class="mb-4">
                                una clausola che specifica che il provider si riserva il diritto di modificare i termini di servizio in qualsiasi momento e che l'utente è responsabile di controllare periodicamente eventuali aggiornamenti.
                            </p>
                            <h2 class="text-xl font-semibold mb-4">Descrizione del servizio:</h2>
                            <p class="mb-4">
                                una panoramica dei servizi offerti, comprese eventuali restrizioni o limitazioni.
                            </p>
                            <h2 class="text-xl font-semibold mb-4">Condizioni d'uso:</h2>
                            <p class="mb-4">
                                una sezione che descrive le regole e le linee guida che gli utenti devono seguire quando utilizzano il servizio, come l'utilizzo legale e consentito del servizio, il rispetto delle leggi locali e la proibizione di attività illegali o abusive.
                            </p>
                            <h2 class="text-xl font-semibold mb-4">Registrazione e account:</h2>
                             <p class="mb-4">
                                informazioni sul processo di registrazione, la creazione di un account utente e le responsabilità dell'utente riguardo alla sicurezza e alla riservatezza delle proprie credenziali di accesso.
                            </p>
                            <h2 class="text-xl font-semibold mb-4">Proprietà intellettuale:</h2>
                            <p class="mb-4">
                                una sezione che spiega che tutti i contenuti del sito web, dell'applicazione o del servizio sono protetti dalla legge sulla proprietà intellettuale e che l'utente non può copiare, distribuire o utilizzare il materiale senza il consenso del titolare dei diritti.
                            </p>
                            <h2 class="text-xl font-semibold mb-4">Responsabilità e limitazioni:</h2>
                            <p class="mb-4">
                                una sezione che limita la responsabilità del provider del servizio in caso di danni derivanti dall'utilizzo del servizio e che esclude eventuali garanzie implicite.
                            </p>
                            <h2 class="text-xl font-semibold mb-4">Risoluzione del contratto:</h2>
                            <p class="mb-4">
                                informazioni sul processo di cancellazione dell'account e sulle situazioni in cui il provider può sospendere o terminare il servizio all'utente.
                            </p>
                            <h2 class="text-xl font-semibold mb-4">Legge applicabile e giurisdizione:</h2>
                            <p class="mb-4">
                                una clausola che specifica la legge applicabile e la giurisdizione per risolvere eventuali controversie tra l'utente e il provider del servizio.
                            </p>
                            <h2 class="text-xl font-semibold mb-4">Contatti:</h2>
                            <p class="mb-4">
                                informazioni su come contattare il provider del servizio per eventuali domande, preoccupazioni o reclami riguardanti i termini di servizio.
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
<?php endif; ?><?php /**PATH /var/www/natan_blog/resources/views/terms.blade.php ENDPATH**/ ?>