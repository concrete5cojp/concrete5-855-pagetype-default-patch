<?php
namespace Application\Controller\SinglePage\Dashboard\Pages\Types;

use Concrete\Controller\SinglePage\Dashboard\Pages\Types\Output as OriginalController;
use PageTemplate;
use PageType;
use Redirect;
use Session;
use Concrete\Core\Url\Resolver\Manager\ResolverManager;

class Output extends OriginalController
{
    public function edit_defaults($ptID = false, $pTemplateID = false)
    {
        $this->view($ptID);
        $template = PageTemplate::getByID($pTemplateID);
        if (!is_object($template)) {
            $this->redirect('/dashboard/pages/types');
        }
        $valid = false;
        foreach ($this->pagetype->getPageTypePageTemplateObjects() as $pt) {
            if ($pt->getPageTemplateID() == $template->getPageTemplateID()) {
                $valid = true;
                break;
            }
        }
        if (!$valid) {
            $this->error->add(t('Invalid page template.'));
        }
        if (!$this->error->has()) {
            // we load up the master template for this composer/template combination.
            $c = $this->pagetype->getPageTypePageTemplateDefaultPageObject($template);
            //Session::set('mcEditID', $c->getCollectionID());
            $this->app->make('session')->set('mcEditID', $c->getCollectionID());
            // Fix the bug that certain server gets 403 error
            // Redirect::url(\URL::to($c))->send();
            /// 8.5.1 and older
            // return $this->redirect($this->app->make(ResolverManager::class)->resolve([$c]));
            /// 8.5.2 and later
            return $this->buildRedirect($this->app->make(ResolverManager::class)->resolve([$c]))->send();
        }
    }
}
