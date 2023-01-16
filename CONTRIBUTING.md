<!--
sail artisan list
sail down --rmi all -v
sail up
sail down
sail npm run start
sail artisan ziggy:generate
-->

<!--
# vim:set ff=unix ts=4 ss=4 sw=4 sta noet:
# nofixendofline
#%s/^[ ]\+/\t/g

i:
	./vendor/bin/sail composer i

u:
	./vendor/bin/sail composer update

o:
	./vendor/bin/sail artisan optimize:clear

ide:
	./vendor/bin/sail composer ide

up:
	./vendor/bin/sail up -d

review:
	./vendor/bin/sail composer i
	./vendor/bin/sail artisan optimize:clear
	./vendor/bin/sail artisan migrate:fresh --seed

down:
	./vendor/bin/sail down

migrate:
	./vendor/bin/sail artisan migrate:fresh --seed

test:
	./vendor/bin/sail test --parallel --no-coverage

test-%:
	for number in `seq $*`; do bash -c './vendor/bin/sail test --parallel --no-coverage --stop-on-failure' || true; done

testf-%:
	for number in `seq 10`; do bash -c './vendor/bin/sail test --no-coverage --filter $*' || true; done

pint:
	./vendor/bin/sail php ./vendor/bin/pint

stan:
	./vendor/bin/sail composer analyse

ci:
	./vendor/bin/sail test --parallel --no-coverage --stop-on-failure
	./vendor/bin/sail php ./vendor/bin/pint
	./vendor/bin/sail composer analyse

setting-%:
	./vendor/bin/sail artisan tinker --execute='\App\Models\Setting::updateOrCreate(["key" => "$*"], ["value" => 0])'

vite:
	./vendor/bin/sail npm run dev

vitest:
	./vendor/bin/sail npm test

fmt:
	./vendor/bin/sail npm run format
-->
