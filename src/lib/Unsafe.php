<?php
namespace CatPaw\Unsafe;

use Error;


/**
 * @template T
 * @package CatPaw\Core
 */
readonly class Unsafe {
    /**
     * @param T           $value
     * @param false|Error $error
     */
    public function __construct(
        public mixed $value,
        public false|Error $error
    ) {
        if ($error && !($error instanceof Error)) {
            $this->error = new Error($error);
        }
    }

    /**
     * @param  Error $error
     * @return T
     */
    public function try(&$error = false) {
        if ($this->error) {
            $error = $this->error;
            return;
        }
        $error = false;
        return $this->value;
    }
}
