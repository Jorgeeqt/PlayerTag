<?php

namespace jorgeeqt;

trait InstancePluginReference {

    private static $instance = null;

    /**
     * @return self
     */
    public static function getInstance(): self {
        if (self::$instance == null) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}