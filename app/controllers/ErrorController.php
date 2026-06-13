<?php


class ErrorController extends Controller
{
    public function notFound(): void {
		$this->render('errors/404', []);
    }
}