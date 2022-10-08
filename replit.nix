{ pkgs }: {
	deps = [
		pkgs.sqlite.bin
  pkgs.php80
        pkgs.php80Packages.composer
	];
}