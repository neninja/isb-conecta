<?php

it('returns a successful response', function () {
    $this->get('/api')->assertOk();
});
