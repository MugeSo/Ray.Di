<?php

namespace Foo\Bar {
    class Bam implements BamInterface{}
}

namespace Foo\Bar {
    class Baz {
        public $bam;

        /**
         * @Inject
         */
        public function setBam(BamInterface $bam){
            $this->bam = $bam;
        }
    }
}

namespace Foo\Bar {

    /**
     * @ImplementedBy("Foo\Bar\Bam")
     */
    interface BamInterface {
    }
}

namespace Foo\Bar\Test {

    $di = include __DIR__ . '/scripts/instance.php';
    $baz = $di->getInstance('Foo\Bar\Baz');
    var_dump($baz);
    // expression to test
    $works = ($baz->bam instanceof \Foo\Bar\Bam);

    // display result
    echo (($works) ? 'It works!' : 'It DOES NOT work!');
}