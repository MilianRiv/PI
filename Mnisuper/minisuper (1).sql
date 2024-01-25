-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-01-2024 a las 06:09:21
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `minisuper`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` smallint(5) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`) VALUES
(1, 'Abarrotes'),
(2, 'Frutas'),
(3, 'Carnes'),
(4, 'Limpieza'),
(5, 'Higiene'),
(6, 'Bimbo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id_detalle_venta` smallint(5) UNSIGNED NOT NULL,
  `cantidad` float NOT NULL,
  `subtotal` float NOT NULL,
  `id_producto` smallint(5) UNSIGNED NOT NULL,
  `id_venta` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`id_detalle_venta`, `cantidad`, `subtotal`, `id_producto`, `id_venta`) VALUES
(1, 5, 60, 2, 1),
(2, 2, 22, 1, 2),
(4, 5, 65, 3, 3),
(5, 4, 123, 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encargados`
--

CREATE TABLE `encargados` (
  `id_encargado` smallint(5) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido_paterno` varchar(50) NOT NULL,
  `apellido_materno` varchar(50) NOT NULL,
  `fecha` varchar(100) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `codigo_postal` int(5) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `ciudad` varchar(30) NOT NULL,
  `colonia` varchar(30) NOT NULL,
  `salario` float NOT NULL,
  `imagen_encargado` varchar(100) NOT NULL,
  `sexo` varchar(50) NOT NULL,
  `correo_electronico` varchar(50) NOT NULL,
  `contrasena` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `encargados`
--

INSERT INTO `encargados` (`id_encargado`, `nombre`, `apellido_paterno`, `apellido_materno`, `fecha`, `telefono`, `codigo_postal`, `estado`, `ciudad`, `colonia`, `salario`, `imagen_encargado`, `sexo`, `correo_electronico`, `contrasena`) VALUES
(4, 'Emersson', 'Alvarez ', 'Ordinola', '2023-11-21', '1231564863', 13646, 'Veracruz ', 'Cordoba ', 'Las Almendras ', 1780.96, 'http://192.168.8.167/servicio_minisuper/imagenes/imagenes_personal/1691816347_64d7119bc6337.jpg', 'Masculino', 'alvarez@gmail.com', '12345678'),
(5, 'Jose de Jesus', 'Milian', 'Rivera', '2023-11-20', '2712549323', 94950, 'Veracruz', 'amatlan de los reyes', 'col', 17.89, 'http://192.168.8.167/servicio_minisuper/imagenes/imagenes_personal/1691816397_64d711cd7431a.jpg', 'Femenino', 'asdfg@dfgh.com', ''),
(7, 'Alicia ', 'Herrera ', 'Luna', '2023-11-20', '2722450886', 94960, 'Veracruz ', 'Atoyac ', 'Localidad La Esperanza ', 1665.38, 'http://192.168.8.167/servicio_minisuper/imagenes/imagenes_personal/1691735037_64d5d3fd10886.jpg', 'Femenino', 'purueba@gmail.com', ''),
(8, 'Eder', 'Galvez', 'Cuaquehua', '2023-11-20', '9412453698', 12345, 'Veracruz ', 'Nose', 'nose', 1350.62, 'http://192.168.8.167/servicio_minisuper/imagenes/imagenes_personal/1691744071_64d5f747659f7.jpg', 'Masculino', 'asdfg@gh.com', ''),
(16, 'Jose de Jesus', 'Milian', 'Rivera', '2023-11-14', '2712549323', 94950, 'Veracruz', 'amatlan de los reyes', 'Amatlan', 99999, '', 'Masculino', 'j0s3dj3sus@gmail.com', ''),
(17, 'sdasdasd', 'Milian', 'Rivera', '2023-11-21', '2712549323', 94950, 'Veracruz', 'amatlan de los reyes', 'Amatlan', 99999, '', 'Masculino', 'asdfsghjk@gmail.com', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `id_imagen` smallint(5) NOT NULL,
  `imagen` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`id_imagen`, `imagen`) VALUES
(1, 0x524946469c2d00005745425056503820902d000050de009d012ac2017f013e5128904623a2a1a12332a9d8700a09676ee175ee001997e3ed68f529263ca3e31fcc2387c93e783d15e80bd2d7f66f50af3c7e957ccff9affa4efea3bf35e881fae9eb37eb11fdbb7fff397ff8de1df944f837ef9fe4ffe9f32adee7a17fcf3f2c7f27fc77ee47c53ff1fc4fe035edcfa71e4d2019dc7df8bff13d37fb5dff77dc0ff9eff6bff99ec1ffd7f1aafc4ffe2f609fe8dfe0fd60ffceffe3fef7f31fde77d65ffa7fd37c087f3dfefbff5ffc1fe477cebfffff737fb95ffd3dd8ff714744fc73eae28d15c259c3a1709f8e7d5c51a1f0dcd13af1aed159528de15f1b1bbf2b8c3f83ea5e088e74ca946c3e39f571468ae12ce1d0b7f6df8e6a09192fd425db1b397c73d94a307239a640d22235b0d76812bd0ae4c1cf68585257684a65d40b84fc73eae28d15c24ef7b6b0e175dd99a6b3a03676cdf668bf7a2f40e1622bbf1b35cb9f3521fce3dac2fe6f8e2d6f451ed82e13f1cfab8a345706b546c63183e771a572a8aa55a3bc152164594865e2015d901a3252a2cf979534bc2aa0482f2ee850b38742e13f1cfab8a3235d47b0317d7175711bf1248ae0896d42ebac3e768930daff75c5859e1e4c13b2afa39a3e129b0c15098fcea3f1cfab8a345709670e5bb45d7d77c97b0337c65ce4459ace67b0f4896dd04755f90cad78e5b273b1c830d6e8cad81d51574e3947784fc73eae28d15c259c2dacfbd7ef6ee743d4ec1cfbd751bbecc94821b10b6e9286c233e8982585502d3ebe16f50b2864a67c096759e49059c3a1709f8e6f6c51e34a440a179b268c1fda75d7c683e97ffb44f2513be961d34ae160c8fd8ccfcdb84fc73eae28d15c259c395000e253913f567fbb91b2b379d6e74c9dc9bb90931daf3db4dae166604c379b8c1d54b1b6b16c1709f8e7d5c51a2258132d333709e4a0f13a93fcd66b09000e4fe651cbf98f84ba266aea36aae8c111ab8baebbca1e059c3a1709f8e7d5c41457aae71052162ae85850f5325818a116c3d3689caef87c16a62a0f11381a63ffbb7771f43e270142465983722e13df50f97767f711567e39f2f30e5227680f14b4805462385b8fa346369a8375ed58102934b0cf88ab48b2b63ed2960164467460ac4b43b863dea4489783fb4c3446115dec5c85cb624146ae488df5aa370c4fe647993aaa3fe0b84f6944a8a9326bfbc1151cab961131387ce8c68f9aea0ad899090fd7c9bc86776fd1a0b1a305c1b7a23433a1ed4ab1ea6dcdaf7b5f93d449b25075cb32fec63929f94581b03a1618789b2c65822528e4c38cee0746f47422796e802ba74171241670e5d274a5910ea9951587b25d8e5257e7a686519db80b532d4d34adc2541fb585b52f8fac3964c909bbc91155ca2a3aecbc2ccd1dabec0aa0005aa7da4da9d6f052ece13c1f94d843375c46ef376e78531c51a2b7393ad4959513dfb813334a5b219bbb807cc51bf8c0e2d8edee3f082b553ee46daff97a514b05047dc0478ae21c671f468e4cc87d041c8395ebd35769e7ebf05a2d653816793be23ba2171c77dc3c7015c259c33ab95e27f09f6377769a8744dc09c9a696fe424860aaa4d55d3c7d360efeb1791b83097d568472b3fbb217f9b808b489dfdbcb275b6008287b1a207038aed0d60b4a5056cb0b8517d0c13f3fee6a88013f1cfa0c2b5e07cba49277982d726f03f52d410674fac6587d7a6e32166338f67f16dad4da1a44047f08d7361e8f5e45b0a5a2e15e6395ced6cf05a06cf9cae37334481dea6beac53fb2e3c4acde5fddd976139548329a5ae6c7938742e128c1752fede0110cf5b1b68d98687bdfd9b94ca2601f5cd69db6956b492ed8bd33f97c0755bd029c50b934ed69cc784b19093fcd86d8e1cb6979847d54b9783c55e9f400b2bdc5110c1b9a1a9413f1cf90c9af4aa45dbe6a93dcc0f8dd14af12f8fe4b6077b2ec57951248d98d393de87a6facfceacfe652ab2e6c21db708c67afef9d921186ab8dbc913119536193a1a0f8151fbe469204e418215d39f8e7d5b736f9b2e7daacbdfa6972847c51704eccecb623adab932487dae959c79888b83d41f0c47f4596713862411d5c9ce665be5362091da048688c48233fd9386fc1887a88631e961b6eaf695f9f0ad02299087bc5762fab8a140728cf7341fc9b4b8a6d4d46b6a3054bfa750db5e42c704ae009794de89e8337c2e50d48a5d77aa6c064f78c221aa45706864ee9fbf458e3a0c201eea9b748bb0949559ef44418522782a92d1f8fc08b94175d79c2f0eaf1160b38742e13da94d83cb07101052e509a731556df28e3be68f06d431493c43ccb544af77a566352855b63e2f08ecdd38e897b55424b970ed9eb12c3d9efc554f02fc61bd2bb4aa7ffef83cc0f60b3dcd9a3e76badd65c259c3a17093b455918cd41a737cfad3f847375fbda0c619e9468fbed152472315a0c31c592f1035f168570a5c9f5d6c9c7a0cabb6b717f30ea165d67a7a23d2ea57f73b3165201f1c17d5c518e0000fefd876000000086bd065e6f6b3a4adf38200f91d624e339ee5de5d8af728ae0b6685003147320cc58c13378e2fd56a5ae7f2dc74fb0c29b72b55f18631ba844e70d731a21f7afeeaf3d43fe7a5c4f4ed8cd948a67d857bdc908472ca4b8bfd61a0945f179c291c33bcdf222bcf8ccf80118f30c0455b2c4585245b460a9a5c24922c0a4e0d9e6f1a0b7266815171b32a63ee5f65d7f04d193ae1fa3dd9ec3ae8c709d06d2d20eafab4828c83669d2ae7fb6b1bddda0f98f87a4be740bd9dc3feb1199ed522286b3703ff23490632c220b9b12539b731b501b5730ae651c9b78cf01d05baeb2a7ab8067d0f967f22ba34670be49e49196076510047719d1c2907fcb5912121635536d09cfd6287b3ff41b8983581ba510429b48f7b5c28e1c7b83be2c5c0976f2856f14ddcb48d69e459b3338e0fc7738d59ea0edcd4dcb3fbfb96e8b6001017b805e0f9562c0e59e0ac987197a344bded4f0510467513851651f06882a325d81ddb8e501bd10dd4352a70d47a46b7fd339775c7997f5318a16bbea0513255945862c2df2c22a5ab3f9184af0ef98966d5e6271959e19fa1bfbb0389f825a22e63ba27aa002e8692873b49d067da91e13ed7f257b841c05c1018c6b3aa8d2af62d76146c8916d9602eed5b646be125c4beddcb2234112af3b54ef4e6c7179a34db3c1a8b133b0644093868148b1662a2081d4c898c1bead240b246d4327e48402e8a646fc4d0fa3051d33a00a0ec17740a99423ce0f6e72d08958a8d55559cf12377c0ff19198f946f51f64135dbfe28c9304eb447d9f1e58586451f51a8ae62a3305317521e8a2ace56cb6da64fa2f8e80ab9e4a252f58a8e1323b6f5cd1697d232a3a9e0102f612300218279a5005f300ec5e25b28ebd035f53d6edd7488f84330956acda5560e1c8ea4d705cd9c6ec094205bc6867ec00151cc6effcf3e8c9b10b6d1b333f08bee9511b191c30b59ce611777331a66a859b1f7a6be19b800001b2a63eefeaa2eb80fc180c5cde426aa31e3c7a4c65b84f97c3931847b685a4c666b585b30a45905c5907064eabb2289b8dc235301661e58dd5fadd4b06ccab8e45540a1c0aa48098875f3b73593659d1e1effee6bd7330f59cde102f717fb86031c7c80a8449634ea8f589eabe54ada46c93984db30ab839e47cfa1d3fcb4ae96f0bdb638c34151c9ecdbbda58bdf5ae4bc32d24eb0ac1d368a89dc58afce36ca897ff6f1bd2159d7b35d48b30cc1ebf76232d1a1f1e76daabc3a7823e3f5bf302357da49279aa2cf760ee301871467f592afab1530ddf0b5c6709b881edbb5b514d05f806f979742fe8e235a25be1831589e2a236f3f0e6eae36a2b8cb84514071b50e71becc34f3e515f02fba92a53eb92adb37f95217e06abb88e721ff001dcaf3f831e0621d3934da7dce7ffb7244a44a31d6a98528ef67c94c4a57639b4eb6f2c0acab972f8ac518792037cfaf30cf1b2bea863545e9ca5a52900a2f555495e1c6415ff5a4ffab2fa97c1c57cc5d2e5f10c27b68233ed97f0d79fb95ad61cbaaccfa5d9159e4b585b0a26ec50d3d490186675cf25e70c97e1a52a56939347fbe59fec88ea6061e9c19c8291e768876bdde2f1104855da11811e747b305631e39efc4ee148c4529ede5260ec2ae99f4185c15fb747f5ea6a2bcee349994f8f4e24dac50b23161ae796edc97f43c19bc6f789f9442ec00396fb238c43b68340e2fc1dca3fb3cfdf7a5e47893dcd9e8e256d6ad0f5c7a626ac3683c7b4a7bda6dbec7b8ddf0147622ba9e89f66f08d2e325ad204382aa1b4f2f232b36025963acb24b862d43a7e1fd2b6d819a2a98aaaa7c89963919f747e8afd46155e37ea5de3f8ba2fd83e7fe33e94bbdb42f7d1568b08c0a64c9b93f86abf844e76a3d890fec1c54a43bc6bcc42c548f71143814f5a9effc705a59e512eb572ad35fe382d547954757b737646e88cc6bc9dc52e59be2b6baea38caf1ea0131c5d9f0048e4107e6aa187a6053ff403fe41ec9220f0917765912cbadfa073ec96c2c325b393be0a8a68891e79f0149c9fb89a1a98bfd20c08c5401f050d6184a9af0731baeac6e18a31a8ac85aeccd94767196c94e20ee57e6b30d1726a1b83da0a335c423399bef09ae53c089ab8fd33b98b1bf7f659eabe8ffb4ec635ddf8949b0a1e29b15a237a244cc2f54850390b244b01b0ac2e14545ebde7b4eb4e9b3fcdfb3d085a5ac9e52ef9748435da3ebf6d86f6bfd1069045c158d2bfc7612dc9bf69f15a529ca46029c42c3e92f413da71cce982ec6a9ea8b94641b4076d4bffb67727c5fb50cefcde1730475488868be91b29a2d9162aaeafd5a066183644d7a7e8f202ce5ecb2d9720a06caa110fc2198aec1d13adec7933239b75bf3dac1527889e40bb91567734f39f04e780e44b9cb356ab86dae40de7e80342fbadb293a1e33a38f45b6ded725029d47c032e5fc004d6440b5023bde1b65c4bfe7e6c599f58644ef12fdbef43513818e5294f6d711b4155aa1af0d2b9d1193c7ab0f36d804901d049a534f4f6cfbf291b8fbcf71a8d0b15958a67dc59cf5d1af865baee369526faeeb65462b10b30e50b8a2ddd87eaa85c2047673e364037bfe9919eda442f638893920c5a96612dc60f7d8de440e702fa83573e27d3327aa72dc00d3d3dde163df1d200a61fe4ea6f1a795ff62f81ebf42e6cf03f5f721c1270c6622528112a85ec5711f849e5a1940f715647f9b553ef600bad13d64c1cd7ac98e68e406be282f16d783fc14d53b83a2da550a90261218dfbcc19ed92d720b66e0a79570225b91b8e1db520b3ca5a0ee2016083fdb38a92cf1cef469e6af514ed0dfeea64ed8c65e55fd8340aaa62c03b59b3c5abe0dcdae1db261b6711f3e12b417f9af13b289591c851c14cdf18000423823fb6d22bbd5ce7fe63c22152994ddf641ece0b31b14d5977ab47e63fec94dc0740b15834a82079c724a24fadf4b1c87e31373b46a8992d69825ea578f99d1259ab307bfda132271614bd3496d4e69dc2a72e3f620c55e5fd55dbc1d40cd93feeac687ce70346aaf5ebaa7fe3b68b6bd814faabcc55ed41ac07f7d2b47217b8625d08c546c6ebe4fcedf3525abfd7502158a237c7ac4d2209e413d832089954375043b0c30d1c91e05887fe85db13c7ac41185517fe317c9c72520d62044c732c1df21c253a1f92272d26b88749eee9e5119b741fc4b0dd5e6c73b596ab1b1f6ac2b1ac72680ca2d855cebb74e6c141cc00ca23a527d80c0ce52b049f41345b121eba720f1c96a4aa10d995ac8602df10a8837a0edd0721b61326b645280214736657e8dbb60c8aa12fbf37ee55a1c272df2259025b073dc85cf41f1322e8936bf8000a9359dddc85bd7ec100f4de0cbdaae18929587e34f4d46b817cb83bdb16820ff1b6b78afc2aa33df8ad7ef8edc0a0aaa5ada555492a6859b5d357fff685286359fe620f2884a16bf40f32e15d7ed158ab552eeeb5a764c136f16b12f84adee41f3333f03b67963342b92df76f70a8a29b46b2f27fd4986b9d496ffaed39fbaca148f813e57071dabf196346c7c03bac60a542e3fbfba69ee2c30077d227b5d62b132883795090aebb6614e435e53eae01f893304dfb61698d6925e476b4792a605dfa50db077f9d4c9a631f6384bdae8f4ea2cb0e6ee6c5b18fefe2a541e762fad41dbdf3cba42c046f46c0ce76bfebf0f89fe334f22baa3573592d9c146d9cc7c1a822c4514cf3a2df2f55db118ffccca3ad508e98acae48a5516a31d923fe568faffefc40f9fd7c84e36ee8ce56fd99ffcc7786ff5b4a2bb6239692c1780dda167b82c0a597ed7a522eaa9198a17a61a3a176d12dcc2ce45d6b26996603b7f02515c76aeee1872ee4f3a87f01420c6ae1ea000e66e6df82f9478677ee3eddc7a0a53e57a430dc002d5b7dff6188a55a76c40156e2133494a828b6d27fc9c820759b8f6900ffe2c1d29deebc4ce4a8eaabd329279837c1b578e6aa9559ba2c84e9f1001263405dce3b9cfdcfc2e34efe4e0fff9ec81f0805165df1460b8ac47f6635a824c9488c02ab2113797d503de349fc32214d29cad3dd5bcb2ebdf6d29b84763b2bd7a3e14ff223203a87300a0009c2d4e306f14af0cd1e970f6bb7887a9456d998b1e41e962df02a11ba6fd09df4563e6e884cb22c3eb83ffc86d9f6a660ed6592f4a631c639e5ad80b624f244e7107f0d322ab16aec43d558e181324068fb3179bccfbc23b5a903feba5fe8ff4526fd98e30e1c25011937cab7eaa5c751004df525cf24190d6aac2ac62b5f9ab8fd791a548c232b8b59f1c7eff3f87be36ffe4adf566345d356f19b1dd1e35d51f28e8cecdca8f1f462bf18d78000b7795b8d4c34adad193e24369ca15aef4b4ad573ebbdb119b315cb4bce2e9abb50af502b6b0aa4993964f8197af731ff082d0eed10f1a039b43670401b3801de5d8551c3cf911d4ffbc6c5772d305bbb56c97398bf61da059ab796fd7ff3f24ec4147f068bb8ebb9e593d36ccbd31a6b174407db1c318e0020bf52b2ce33de95714b82d313cc93a0980f008fe34606d9654dc8546ba52c4473fdf060d619eedf91ef8375e0f93904e6ed0c5aec3246fe49d62705ff28fcfc2121095e74305db22d0839d6ce3b940c85ee220a028eadb4e82dabe7db50416f720abd852a4e0d24db42086fda69d0adae0fabefd62108f707807c04931eccc90d964efbe42189685c1c168269feb86fe122478a6fc6d3ad708f420d5f5f4ce6cd45b39ef51d9ed225b4b81126b064dfdefe0d6a0e9549d3423ae0243b60faa77711d7ca7f549d3cb5ba9e76a7c15a7f3c6ee396735993684e76b92fe803c20ba49d8110509f54fa179290001b2bae874b7f75cadec743fac72e9d4c6c9c72d0b6e5e07ce16ffedead5562b4b2d3c60ce3343943bcb9f8854a5435bd4793490b2bece545ed244e832f54b9907c2c5e8c46d65557c99e6f3eb05c1f0570039f364db757234f27ff898c9d450966e201edd33bb423f44f7db8efd6ce6b9f404e1d7a9650fac673a09c4fb97b563990c62de78d9a3833aa92451946565bc4f979d694a8dadd150ba26008f179a0a35073e3335eb11a4e3d4bbf980e4d3625c75e6fc0f5044f0604bd913bfce202d50974a1690cf37b7d154da9f530279421aee4fb955181a6a85048bd10c358c25c7dff76af6757086dd0ad684038e155b39c30fbb328bbfafc132a6d162fc1d10c03e08405d8a535fa4b2c4956b0436700c8f08bb3ec2f2dcd70ee2a95681eb9b05c9eed52426c0647dba2fdab02549d7cc3259758000adb1d3274a970d0271aee4dec94bf78cbcb740e9b943891d45a0acb8e6d34a1abfffa583ba3855cf2f4d5531c2a7be99bafb23a319f6310bbc2975c2c95560c8a9def1c2a600096e4dc8da3f7e779ee7fe1528f5ddd7c41ddf89c8a0d8abc56e7d336b327dd24810219787094249af5353b2046e0a6e840c4100da17d81fff9261018723d9fdae3cc66564b05a4c49df602a1fd1f7596559544f927c8202116c03065505702059e8cb417d1eef5cc5bff900e5391ad21858cc5ed18febb5c9836d95d71b9c228d0b3a41e8ca643cf48d59122baf7a0dfe7bb404864f16ccce8177da7d61919b27398387f88dadffc9dc6634ce07740fabfb6bc2fae12acf26c02b7a05b98db042f9bd5489ca4eb4303a5ea8d1b8e32e8d35059e4a01a52b3e1cca34510c62d85b9a6159118b9820f048565fa5d34e98f5801c4e6d08be22fa06ddb3548784ac168ec9cb76df3970057b7a3b12fc62de4c8d3e6891217840dd7c2f5bd2ffff60f987fefe54f80e05b95b72fd124aeadfb27ecf66a57feae9d5f7f7db7cc14f30f38141b6ba52ea9da13a67379fd9a96d03a55575a48e328cc483e91c77a0ecd9ef2d2e95ae6971e68bd0282bc32a6350626f5d4a4853a92e55eb95a6518406d6bdbbb1027993aa6123b26599369dd4010d4f55cc6b7243a009d4ee9e5be31d006ba43c83d1fe14dd675c13b89d8c9b435dbaf678c47a83294499e4a7f27c67364466ab19a6be6c86889dd5deb9fb1ce2e98f7ce001b3f92e52dfa06374d91e8dce155b15233013f85616c85513477673143659d834365d8b6835a0aeb96f5dcd5110a418dd4071691c754375e331b89d0b7c7993e805c889b48a93a41c00fe9eb597c88ccea17ba33ad681bf5e55404dbeeb09a405f44a736f640ec196e3b8a3bb6a821735f7ac2f67d7cdf050df53ca5b63cd8d4d952fd62f8c62dd8b91e125ba59a529c9928a660ae87bf212c37b0ff59495f5ef98957cb1a299be022a43686e9885109c379fc8963f53ac2e3b38fc62d914f145a037386c9d5cbd1711121d30927b8d03a8ecd92002cb4f83458e883483c456707c0add975697b67bb37883987c484ab2cb394e55e30208e35f73d9d115ede6f1db3d93bea19c0ab785f864c2ad5f1f36485f4c06ee36af90b79735da8c640d742609eef675cfe00c9d1a4faf06e6acf542e4e1640cb951254f947cf263597c184d73eba0e694423eb8f6450cc0ae3d3ba489a7c8303c745b3e636a6b509ddcb641107ded85a8cb1bd2c0211d627423d834b2fa350914a2191ef960d50b757b9b68d7d432d27f935b816d2512d7fa79b42c540031ecf26f45d3cf7a6541444c4e1267861a5f94c95bd201058807fe24bf5e7da447900bc095f0096eb0a3706f367cda8c8fae852292a47aa3b2748beea411a72642869cdb88d49d100286f4848d691be5b65bfce0dd9136e472c9158e14c4cf6b4dd3052a436c48772b9cf306a0f64dbb2964678a231f2052ffac2d76bd1095df4c73b3c4e4003effa3992d2abce5434763e61f35363cc80423f89c56ca9b226b582be5c5b48f40920ec826e91e45557598c2f349ffeaf93da75e283c6b8f92175ec39b6c844157fa57d351c1574857ddc63d9df10a22e47b42f58b06ff8f96dafcff3fd5353648b2643b91b38291d4cb0921ffc3e9bf3bbb125045427f9318706be25f67ee4c0e991ddb71c85f6246bd2778cfedf44bf2fbf9f016c14298b09c89d205fa645cc90be5356cc29383c7fe55a778d8ff9af4bb27fc0185089be26f25dc388bd193673f99fe0d7e0aa8f864b1ec515c6a93e41ebc1933c8ecd44c100d1d92ba2e29902fda8726161a8bc94c92b39c9604dda15b055705f6c1c8414cfeeca0527f046a8379105eb9747cf3bb1c1646a7b81ef701271f3a3d481d5410e549db436f34ae139bd9f9a41c19f39826657ba04bf63e43a1a18265dc125f7d76f3ca26f50fe5e69ba2a91e3d255a228db29afd82dd49cf86d661503e5a5382dfa82e936242d324be251afaceeeeb15802ef7f3ff81fcfe72e6bbf821d74d48a8961ecc4acdf3a3f940b351b4d45a04aec16f65d78776f1d0d0ff2918ca3e997e9372a0b2cbfab146095d795848bbea05114adcaa517f8dd1833ca01176c26dadb310d36b01340c1f4c1669965a8d2e300174dd5163edc611cf6f8eb855985bda86a35039cc511990d1ef828dc3ab3ab1fdf550b64099a100bde94d02b3ffc43770a7d061f2742c27959ece9cd0e353383c15e479a9ab4f5a650794ef5c610218c73d09ac526453df4eb30ecb95ffb82fa945fa1b10520b3f6ce4bd5f3c522ff211c636a2ab0b30af6f53dc5741deac2ec1d12fd40c9bba58fb4059e6efe59f064aaf9b8f9871dffa60d36634d5fb47d4d3bd887927e4790ec45fb9edfeabd41092bde9edf390a205138b716ea60e7dc4c16d4bd8a4323b6127b580e4cda0609c7b715b13b1e362d9e944a402c3dcf20131d49dc43a2b317e8e9eeb408c01b16a9a9c44eff113a1e623f82bfdcd1b15b186c72737731c0cdbc9a9dd66b9738e0eb8d5f13f512c7691e4c582929304fd4828f6c80a2e46333d9c45806c29377560e6351314d98e5f2db6d717412868d53d0dd74e770cf435f7a8ca1e77f2e3a688be6d7560139ba0c9b44d94608731c63013787732769f85352fb9b5faf5f2658884d8644fa61664ffc85a9fdd25604687527fbaf9d7c1cb8d3109895b812aedcd7115481ef735462b31fb81383a005eb28033e2d171a1a0e1dd78c01195f25bd34096839c537a9a276aaa554082d13d468acf3568edffa0c66ba0579ada0399dd6d86b0fa507bdb4fb5aca94962da6c78002e032f1056bc176245e9c6f6721d5c363fda21d9441214420fe3a503045dfcede4d0d58654bd6fbc9b1b5264dc52550c9e77ef0bed17370c67f5a1a527dc8cc01aebd343d73fc1b9eac3738e5f469fa3be4c310ff8e8da14d8a9fcb92d6a7c8a1a993f76d2da68b111f5b0fde51f3773bb7fe14bca83c0e072e7ea34337e3477ad7f056852ddca8feb1fbbd956ff1fee961c218a658cf73dbaafcb1605abdde924f706c09d15fdf88299ae50ab5e0b3797139e935fceafa8f22b75abc6987070d177a8100c66ee77489fd1344ebe26d3ee3f96716b9a9b4213deda97efa7a259d7080009dbdf1653c65cc52732e9d89787e8f5a0451d56c6e9d754ac104528b6e33b9a4e829e91d3c7b74160e185a0989285f21f964db20e5ecfb9af88f28b3e9b6a209198cbf43172bb2fd740ed5de2ef85bc53439b8232de1753e157ea93a3ef4d581b665516c32b2b1a9bf815eebac2c62e7583233ef91373083f6e858214b74856d35082bfb3950bebd5b0d0df98037023138dd2552b49068564dde6c525baad6ed35ee0e280c080b5d3a1021e526d0dc272db4e3b6b49ea69e7f9e17f11f845c75a7d49ec14e2417d03692238a080bd1195302de3a0eda183b5d37f136675e996caffa8e7e427ffa74e9077b7251761c51f5c51c3ec3d4a5d99cde19b2883195fffd52042cb86dcad29015683b45045339632b4bd5441cef84894e4f01093ebedff27afd407ff98c7273c4d9a9776454c5d36fb77051d1de8d037041afe87e82bce389cc8982bb3c3894111121fff9fd110eb7e6a028967fd5c1f8a564cb71c3b7fed59de0fc37c77e428989c68e655fdb5e2380fb8debf121922d26f5fc1d5c906b908da03451c9fe4761eaa9191e447a47e8ff84953ea8c2c39f39e1755a2b210b6a5417cf004e49071d400d8557da37f9cada03520986c9ae3c6f10d5f5d5deec4c0c084d405fe5afe91f6c54d056feb3ed665199584f1152371515676122dbdefe8228e476e95c2ab69fff61ca9c50979d1ac7b9bee621c45531e624276437561dc721d13b6ad47f0384858221b60ff9c35b478763e16e916346875a4fd1806e65b957329722e4802b61a2aa8d4b4147664f0ac36d17270ce10e0498251b196adf20381b4708d36005d2f0b66a3497c117b36802e174b72f0e87572c7cae2d880d884697c272186bec3f3553252e29aee824b449d7f6246556de884a957618989e0bb652d33f8b09fc27c70e400c9b8957ba5f868e977b062c654d236a80c4baeb25cf355943e3d7852db09203a808059dccc3814b4b5de4da5f5621e64607df51d770ef7ccf0fa964e86854b632c78482c56752eaf48679c7e923075cbb823b511cb5fa25a377455b7c4e50cd00f7d67cf050e1a29f216134174a2a90718c5355d207f10a52a6b4bd9eae43762e18e199876b63cc32f918eb7dfa14dfebe63a91dcf778dbcabc036e9796e9dc48ee17f1ebb9fe47953d0a998509eefd9a456cc7df3577745aeb9ca92d60df82af1302e0aa8aad12fbb6bf281b6e9f14fc34e6bb0f0bdf6a5526c777e1dafa8be845ffc3e41e169308015846b43078798c6db24b82dc56999a67eb4447eee4a111e5a83861619d7de8fa89db6f83fb2bf8ed8f5ab99e9e9a6aaae211bc1af617667240a70e4a402416f38c0177619a7f1073b0106dceb07c8e9d5e340bdf21f5e26eee777e9694d50585b8106083d9d51f4842b138e0b29adfcc23871dde457bc19e9e400a7aeaa399cb35b1b475b3a290134728c70fc8a971cf50fde013a4a40f965cb55a5e71a3b6bbd0397955a30142ded8e26346df752770c51b5461a3c793a8e28684b31541c15a8075812dd853e18df9aa7911fac42b36101c33263f4710f9194a5e5ea313ce1c28d57abb571c5f4cc6ea31c619f9c3ef4cf39de7df292388b8f1af0cb568e11bd0d3bff106e71f4a204c1d8c26c2df84ed1ecbfc63216c59803d48d051581f00019532058278fc8cae23cab4bc4585c4aa485a7c218f8a84fb9c9ba67b67b32e7e248114a3907f0dad88a2981e9084a22aebd07a70a4571312ddfaf2efabcfc46f522a167bb6d8a1071b32cfe4842a6c8315d5f62425deda758a0bf9fee21f949a46c8770b8b0eb0cf03c52f11a8bf2039005814a3ffdd53c41b91aee186d324c81d390d9b8067611580e35f8103d16d7ee0d7da3b4f2fd53aa36875a5dcbb176b0b7e8d03c1194d78b285c4beadbd5513507f40bf8ad9092237cdb370edc1b6b9bc56bbaa557e05a19b79529cb550aabfaa1d2e6a9ecbe2d5ee04739214cf42fd9c0f0673bfa8c1f285552b8a5b156f2f9c4f4635a1c54e670eab4e57a00c34764811a96e1fa0fa0e33003b26309b5d051764414189dc0b072bee8f7ab3dc97ceda2aa5cee79cdb995db18b83e56423d242426d2333c6cb7022c90daa74d77a1df2fbfe95de11cf9e764d87cb039e6070191c388628401b0d8aa161dabbc6b792825993a9ab2afcf5ff47d79d07fe8f5bdfe3df392a397bfaf17d6920ddf8efff7bc54ff4e3ca61cb81ffdc5d48310cdbff3eb26c9831da6cd5ff95780f01e7b0395b5f7e3eed543ec34e7802ec53ca1dc67413964552d5687604e98750ed03251f1909d9451b57c126157ae00fc977a9add3c0e2c57972845d8db42a38698663bc2d60ed0e2b789eeffdf2d21c8f4f137a9b3e5230c01388690132e213aa38da870f408d12a267f445e45345e042b01467fb8005a649c2b7d6bdb21d6e878df688034c4fe45e38cd07ea441c0ab0df209f47f47e46795021fe0d220e623c686b0ad5859bee2f872a92fdf254a21c234d456ab8b62aaa243a5f4c46f4c8715984588bde46b37fb1494fddf0b9ffe965fbcb9f487632ba8d8a1bb38ca059f0d7474fcf8ff794cbca49407fe8d2b8141576ba350cddbe450560f2b48309136d499d2d49a929ea94610dcc46ee6354b9527ca6a36a978397e625cbe9575ab3a9977d4160dbd4e74cd2bbf3fb6e8f21acd57dd4bf82e0dec6a6c49762144e27482aa543afb88e60161759013c78ed97d3492bf5b6e6b4650d4b424aad968ada70bde6f02461ebd2e65ccf530129447e5cfebda571b703eb3f634b75a53ce68d4111fc78982ca3edc5fd0b39071a5b44abc2e0b8f831ca00b7c9badbccc0dd49dd1e90d339bbaae27ff36d79c29edfcbe590d599269535f19d6432f0c51d2158fe8976f850b86b0b8484ea5db1440733d40f28fc62877549d4821b145dd194bbfa38492f7dea5503b003a29e70149b470faa8b7aadb2ebe0e6064191388664457f5025ed8eb5112f22a72d57019b68d923dcf0ab7973a45d2e6eb8c6d74fd146645ce4a7ae7d79c8f808103aaf7c5036db16412798c5845a85ae524ee3be86aafb12569918857ff7c16325a3677eed0991d7d3d4996f90841e11b978976b5256f01c93419c8167cd5989a0481db19389233e86c1d64968ad30f93b7df3f87fadf6187f04d54b3e09a0d476d315ab32391db2219a4a006c379d723aaab267658b4e15bfce2e79e770dbb6df6f85e9d53cee4061f537935b552fc2d538c03831f444c69e763d9d50dca773dc712ca57f2f6f260d72518e946d6e80d68e26fc5b510562bd3018e6db6adb83ffa5e03995fedab99f1be324dd8e167aa9d1a4f58e83f56a2febc9e960d060eab938fd1b57068a1a63876763ab464dd71ac18327db27e36703565f7c301a375a6f4157100ca5632999c0ff096d03d69b02653a8cd52f3615fda2046ea8defd9c26687dc0d5115bcbfc2b17d338bf80f053e5a9da99391bbd3d9a9d17d2c51918995426bd49d2b015f42d7d152dd98eaf19abc7f6a83a30ac21348bafacb99955fd959d753bdb86a522bcf27e4557c483d2fa4de3fecac1ece189b4d4da14b9c9f6880ac5d07fa435526191e503678abee9db6506a0ecb7fcca19a6a0d154bdc6a64d8caac782f18ae524753da34ba9c6d8f9614c1fd742fa077fec7413151b800006256eabe34bbc46001bee4a315edcfdc4dcea0ba3c396c252816359d16db666170d2f522da50ea988419e22f51d4a2849542290721ed47687925558803e973a2f48e9f97c46fdcfd39271f7c37eca39ef13615d2bf60109006ac1405521f6d9639c942d1605f2873a7910bfc86907cafa919c7d895d558cfa9e33a5cd9e31fa787d15c5d1ad38fcde0fb3da2d1887e2380f91948a5c19fdf8f5b8953609072a6c67b4482dfcc99c170db9794f27e3029b766a1b51a3440f762c8a9357e457849b1d2dee5aa8f55d90cd19961c631d099ea8e05922aa04c148c25e2ec75e24232eb112c21c3ffc4ce6a49ce41082c450d39fff935d7ba4e1da6ea2603e9617785dc8d2eaa07cfc904025995cce7efb74b61f9ef0e0f6ceedb7e9f42b2124fe23f2bb7a38c2e9f280f032d5cccf1350133699bd799a7dd4cbcb1c1400163cddb1cf76671d2935fcf94a822d7f06b5084a812d80963fbe4347425a9ea2af2403a8701f6f84105c663eba4af93ad9e8e9112170f4d671c388bf98e1fb47d04ae46beb3eb2d663ff7d4bdd71779c41ca4f7a2b151b3f742893b1a24d4c6cbcacfa0d6fcc6e6904c4e885bcb13cba4727a006b49138076d74ff0e139f32d7deef56b784d60947c4b0906059323b47d68db2c4d3a610a72c788bb68757eabf004eb37c1e266a564bcb2a0c88786fe157ea1c995e2688409ce8acb28440c8b69e9281bbb9c8288d23e453a1928de58508864aa9b2ba67d97c06341194f1d732e3f4ba7b7e65a7e5e651d3da175acbb2a0c08626c98fb9262179ade589fed32984c30f66a9e0aaa6cf50442fec98d95d63c4d6c51248f3f4d42cecad02d678e863a676390a8d94f7790520dfa3b9351014837d54181aa761e48fb3f5076e7af3416b37369d7529c3829d7f46ad80ad508f2af5ebe3c1c585749f7a639714c460bc1dda19565ae1f9d7d7629320720eafaac5a3c89f120357fc6f482c48ab8c162453cc1054a217559a592343dd704eea088faca48b8314c5e895a28c0f25a7d70e34472c101feedc651ae797b93c25f6a66933f7ff8cd118696c766d632783f707a4475c6fadfde698e50389997ad01118013055a5f46a83733b4a938db5797887b3e722d50313f27732d66248a94c5208666809a9c6b5a762b4f80232ee586ce05c9ef33bd3806dc39cc40c5d019ab50e0bcf2020e54ecb225c294d13b494b7fe3ec0ca0fbdd5ec99af89d7a5b425378c9548518d10d7e6d0a0cfd96ab0044ce91e86b075782331cc1f03200067ee7086f1fd05205e7d28514fafe3af801640f1be2dd4576b9b8627dab9af16bcb26ad071bed4d95204c458de6a71b3bed12735f553032d7770296b703ac10f9f782047776a70a2c7a413dd925c90c417282b76f1ed54085d867826b5884211a0d06633cb70942dba587663342a79b8760631c0c8c0add3fc5060c7d5b1863c4b62a3c7b8aa4a42fd986529ee4bcac447655edd5c33746b2452e712403d65889ccc70c231867ec0ec93d06b87503dfcd4e38952669f0104025f4a1eafc5d1e97690b13d392e3aa8adf05be8b320f9cb0bbc6787e8e81a081580e20c0de97acd03223b3845f18d540486faa976d769427d7727053ed7cf9eed7ba9ba1beba55cc64915b8b111aa418c881bbc56cb733b2feccea6ea2908c5e8b913bc85afe208d16703a16e81328c8ae5484f9366c242c56066fa42fe83b5c288330c763df7c2a95c388869364415e39ae740ec5a896290b34b23e9eeb7ddd97cf05f4a9da14ef0a9407ffff7d5c66ef9e44a7509c773005180000000),
(19, ''),
(20, ''),
(21, ''),
(22, ''),
(23, 0x30),
(24, 0x30),
(25, 0x30),
(26, 0x30),
(27, 0x30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` smallint(5) NOT NULL,
  `codigo_producto` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `existencia` float NOT NULL,
  `precio` float NOT NULL,
  `id_categoria` smallint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `codigo_producto`, `nombre`, `descripcion`, `existencia`, `precio`, `id_categoria`) VALUES
(2, 'HEI8ODJ', 'Manzana fea', 'Manzana Golden, fresca, la mejor de la región ', 100, 53.69, 2),
(3, 'CG1783', 'Chorizo español', 'Chorizo marca \"el cerdito\", estilo español.', 96, 60, 3),
(4, 'KLAI23', 'Fabuloso ', 'Detergente para piso, fabuloso alternativa al cloro, 3 en 1', 3, 24.5, 4),
(5, 'JSKS8', 'Protector e hidratante', 'Crema línea \"Nivea\", protector fps 30 e hidratante para la piel.', 58, 38.56, 5),
(6, 'DG63JK', 'Dog Chow Adulto', 'Alimento para perro adulto, bolsa de 18kg', 90, 167.8, 6),
(7, 'DV8YW', 'Duraznos en almíbar ', 'Duraznos en almíbar, 820 gramos, marca \"La costeña\"', 46, 25.63, 1),
(8, 'PF3KAM', 'Alimento Pedigree', 'Alimento para mascota, raza pequeña, marca \"Pedigree\"', 24, 11.5, 6),
(9, 'HJS82JKS', 'Jamón de pavo y cerdo', 'Jamón de pavo y cerdo, marca \"FUD\"', 20, 38.56, 3),
(10, 'AYK82', 'Axion', 'Detergente para lavar traste, poderosa espuma arranca grasa.', 29, 24.91, 4),
(11, 'CC90SJ', 'Cloralex', 'Claro en gel ', 50, 15.45, 4),
(12, 'PLT892', 'Platanos', 'Plátano macho, amarillo ', 100, 12.6, 2),
(13, 'M6YHJ', 'Mayonesa', 'Mayonesa con jugo de limones', 50, 35.82, 1),
(14, 'C16839', 'Calabacín ', 'Calabacines ', 85, 12.56, 2),
(15, 'A84KK', 'Agua Micelar', 'Agua Micelar de Garnier, para todo tipo de piel', 6, 15.63, 5),
(16, 'GJSIIWO', 'Juguete para mascota ', 'Juguete de plástico para mascota', 15, 12.69, 6),
(18, 'SA35HK', 'Salchichas ', 'Salchichas de pavo, para hot-dog', 6, 140.6, 3),
(19, 'JAJD', 'Nescafé ', 'Nescafé de olla', 25, 78, 1),
(20, 'CPRI', 'Caprice', 'Shampoo para cabello ', 95, 25.6, 5),
(21, 'ABCDE2341', 'Maiz', 'Maiz transgenico', 200, 7.25, 1),
(22, 'sdasd', 'asdas', 'asdas', 121, 12, 1),
(23, 'dfsdf', 'wsxcdew', 'sdfsd', 2345, 23452, 5),
(29, '34', 'Jose de Jesus', 'ksjhdaj', 234, 2134, 1),
(32, 'dfghjkl', 'asd', 'asdasdasd', 23, 234, 2),
(34, '123456', 'Arroz en grano', 'arroz a granel', 23, 20.5, 2),
(35, '7500478026036', 'Doritos dinamita flamin hot', 'Totopos de maiz', 1, 17, 1),
(38, '7500478026036', 'Jose de Jesus', 'papas con queso asi mamalonas pues :D', 23, 23, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` smallint(5) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `rfc` varchar(14) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido_paterno` varchar(50) NOT NULL,
  `apellido_materno` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `correo_electronico` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `marca`, `rfc`, `nombre`, `apellido_paterno`, `apellido_materno`, `telefono`, `correo_electronico`) VALUES
(1, 'BOING', 'AAA123456S7Q', 'Marcos', 'Burgos', 'Aguilar', '2752563696', 'marcos@gmail.com'),
(2, 'RICOLINO', 'GGG123656VHO', 'Maria Julieta', 'Perez', 'Vivanco', '2458965471', 'mjulieta@gmail.com'),
(9, 'adfghjkl', 'dsw', 'Jose de Jesus', 'Milian', 'Rivera', '2712549323', 'j0s3dj3sus@gmail.com'),
(11, 'sdgf', 'dsw', 'Jose de Jesus', 'Milian', 'Rivera', '2712549323', 'j0s3dj3sus@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` smallint(5) UNSIGNED NOT NULL,
  `rol` varchar(50) NOT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `rol`, `estado`) VALUES
(1, 'Administrador', 'Activo'),
(2, 'Empleado', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` smallint(5) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo_electronico` varchar(50) NOT NULL,
  `contrasena` varchar(10) NOT NULL,
  `imagen_usuarios` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `correo_electronico`, `contrasena`, `imagen_usuarios`) VALUES
(1, 'Jose', 'alicia.fehelu@gmail.com', 'milian', 'http://192.168.8.167/servicio_minisuper/imagenes/imagenes_usuarios/1691625109_64d4269564b42.jpg'),
(3, 'Emilio', 'emilio@gmail.com', '12345678', 'empy'),
(4, 'rdtfghj', 'sefrdgthfesrdgthfyg@dsfg', 'adsfddgbf', 'wadesfrdg'),
(5, 'asdfgh', 'j0s3dj3sus@gmail.com', 'sadfg', ''),
(6, 'ramiro', 'j0s3dj3sus@gmail.com', 'defrg', ''),
(14, 'asd', 'j0s3dj3sus@gmail.com', 'dfghj', ''),
(15, 'Eder', 'egalvez@gmail.com', 'eder', ''),
(16, 'Morales|', 'morales@utcv.com', 'Morales', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` smallint(5) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_venta` float NOT NULL,
  `id_encargado` smallint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `fecha`, `total_venta`, `id_encargado`) VALUES
(1, '2023-11-12 21:46:18', 800, 7),
(2, '2023-03-12 21:46:36', 600, 5),
(3, '2023-01-12 21:46:47', 100, 8),
(4, '2023-06-17 04:21:42', 500, 7),
(5, '2023-11-14 02:39:36', 500, 7),
(6, '2023-11-02 04:27:50', 1500, 7),
(7, '2023-11-15 00:38:36', 200, 7);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id_detalle_venta`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `encargados`
--
ALTER TABLE `encargados`
  ADD PRIMARY KEY (`id_encargado`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id_imagen`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_encargado` (`id_encargado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id_detalle_venta` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `encargados`
--
ALTER TABLE `encargados`
  MODIFY `id_encargado` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id_imagen` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_encargado`) REFERENCES `encargados` (`id_encargado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
