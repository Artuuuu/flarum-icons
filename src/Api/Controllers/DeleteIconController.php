<?php namespace Fajuu\Icons\Api\Controllers;
#
use Flarum\Api\Controller\AbstractDeleteController;
use Illuminate\Contracts\Bus\Dispatcher;
use Psr\Http\Message\ServerRequestInterface;
use Fajuu\Icons\Commands\DeleteIcon;
#
class DeleteIconController extends AbstractDeleteController
{
  #
  #
  protected $bus;
  #
  #
  public function __construct(Dispatcher $bus)
  {
    #
    $this->bus = $bus;
    #
  }
  #
  #
  #
  protected function delete(ServerRequestInterface $request)
  {
    #
    $this->bus->dispatch(
      new DeleteIcon(array_get($request->getQueryParams(), 'id'), $request->getAttribute('actor'))
    );
    #
  }
  #
  #
}