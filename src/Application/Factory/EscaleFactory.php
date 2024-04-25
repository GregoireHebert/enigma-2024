<?php

namespace App\Application\Factory;

use App\Application\Entity\Escale;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Uid\Uuid;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Escale>
 *
 * @method        Escale|Proxy                     create(array|callable $attributes = [])
 * @method static Escale|Proxy                     createOne(array $attributes = [])
 * @method static Escale|Proxy                     find(object|array|mixed $criteria)
 * @method static Escale|Proxy                     findOrCreate(array $attributes)
 * @method static Escale|Proxy                     first(string $sortedField = 'id')
 * @method static Escale|Proxy                     last(string $sortedField = 'id')
 * @method static Escale|Proxy                     random(array $attributes = [])
 * @method static Escale|Proxy                     randomOrCreate(array $attributes = [])
 * @method static EntityRepository|RepositoryProxy repository()
 * @method static Escale[]|Proxy[]                 all()
 * @method static Escale[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Escale[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Escale[]|Proxy[]                 findBy(array $attributes)
 * @method static Escale[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Escale[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class EscaleFactory extends ModelFactory
{
    private static ?Uuid $trajet = null;
    private static ?\DateTimeInterface $startTime = null;
    private static int $created = 0;
    private static bool $initialized = false;

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    public static function newTrajet(): void
    {
        self::$trajet = Uuid::v4();
        self::$created = 0;
    }

    public static function needOneMore(): bool
    {
        return self::$created === 1;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        return [];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        if (!self::$initialized) {
            self::$trajet = Uuid::v4();
            self::$startTime = new \DateTime('now');
            self::$initialized = true;
        }

        return $this
            ->instantiateWith(function ($attributes) {
                // Generate a random date between now and +30 minutes
                $interval = new \DateInterval('PT30M'); // 30 minutes interval
                $endDate = (clone self::$startTime)->add($interval); // End date and time

                return new Escale(
                    id: Uuid::v4(),
                    trajet: self::$trajet,
                    gare: self::faker()->city(),
                    voie: self::faker()->word()[0],
                    horaire: self::faker()->dateTimeBetween(self::$startTime, $endDate),
                );
            })
            ->afterPersist(function(): void {
                $interval = new \DateInterval('PT30M'); // 30 minutes interval
                self::$startTime = self::$startTime->add($interval);

                if (++$this::$created > 1 && random_int(0, 2) === 0) {
                    self::newTrajet();
                }
            })
        ;
    }

    protected static function getClass(): string
    {
        return Escale::class;
    }
}
