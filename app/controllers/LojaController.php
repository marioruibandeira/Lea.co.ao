<?php

class LojaController extends Controller {

    public function index(): void {
        $this->render('loja/index', []);
    }

    public function certificacao(): void {
        $this->render('loja/certificacao', []);
    }
}