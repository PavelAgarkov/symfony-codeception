<?php

namespace App\Tests\functional\Archive;

use Ramsey\Uuid\Uuid;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use ZipArchive;

class ArchiveTest extends WebTestCase
{
    public function testShaSumIntoArchive()
    {
        self::bootKernel();
        $container = self::$container;

        $fileZip = null;
        $f = new Finder();
        $root  = $container->get('kernel')->getProjectDir();
        $dataPath = $root . '/tests/_data/';
        $f->files()->in($dataPath);
        foreach ($f as $file) {
            $fileZip = $file;
        }
        $realPath = $fileZip->getRealPath();
        $relativePathName = $fileZip->getRelativePathname();

        $archive = new ZipArchive();
        $open = $archive->open($realPath);

        $uuid = Uuid::uuid4()->toString();

        $generateDirectory = $root . '/var/generate/' . $uuid . '/';

        $extractTo = $archive->extractTo($generateDirectory);

        $close = $archive->close();

        $f = new Finder();
        $f->files()->in($generateDirectory);
        foreach ($f as $file) {
            $resourceFile = $file;
        }

        $sha1 = sha1_file($resourceFile->getRealPath());

        $filesystem = new Filesystem();

        $filesystem->remove($generateDirectory);
        $resources = $root . '/var/resources/';
        $target = $resources . $relativePathName;

        $filesystem->mkdir($resources);
        $filesystem->rename($realPath, $target, true);
    }
}