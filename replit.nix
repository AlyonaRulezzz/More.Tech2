{ pkgs }: {
	deps = [
		pkgs.nodejs-16_x
  pkgs.sqlite.bin
  pkgs.php80
        pkgs.php80Packages.composer
	];
}