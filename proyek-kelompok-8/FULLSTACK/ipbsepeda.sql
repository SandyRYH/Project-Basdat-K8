PGDMP                         y         	   ipbsepeda    14.1    14.1 '               0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false                       0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false                       1262    16394 	   ipbsepeda    DATABASE     m   CREATE DATABASE ipbsepeda WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'English_United States.1252';
    DROP DATABASE ipbsepeda;
                postgres    false            �            1259    16463    admin    TABLE     U  CREATE TABLE public.admin (
    id integer NOT NULL,
    username character varying(16) NOT NULL,
    password character varying(255) NOT NULL,
    mahasiswa character varying(50),
    gender character varying(50),
    fakultas character varying(50),
    departemen character varying(50),
    alamat text,
    image character varying(50)
);
    DROP TABLE public.admin;
       public         heap    postgres    false            �            1259    16462    admin_id_seq    SEQUENCE     �   CREATE SEQUENCE public.admin_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.admin_id_seq;
       public          postgres    false    210                       0    0    admin_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.admin_id_seq OWNED BY public.admin.id;
          public          postgres    false    209            �            1259    16535    history    TABLE       CREATE TABLE public.history (
    id integer NOT NULL,
    mahasiswa character varying(50) NOT NULL,
    jenis_sepeda character varying(50) NOT NULL,
    kode_sepeda character varying(5) NOT NULL,
    tanggal_meminjam date,
    tanggal_mengembalikan date
);
    DROP TABLE public.history;
       public         heap    postgres    false            �            1259    16534    history_id_seq    SEQUENCE     �   CREATE SEQUENCE public.history_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.history_id_seq;
       public          postgres    false    218                       0    0    history_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.history_id_seq OWNED BY public.history.id;
          public          postgres    false    217            �            1259    16479 	   mahasiswa    TABLE       CREATE TABLE public.mahasiswa (
    id integer NOT NULL,
    nim character varying(16) NOT NULL,
    mahasiswa character varying(50) NOT NULL,
    gender character varying(50),
    fakultas character varying(50),
    departemen character varying(50),
    alamat text
);
    DROP TABLE public.mahasiswa;
       public         heap    postgres    false            �            1259    16478    mahasiswa_id_seq    SEQUENCE     �   CREATE SEQUENCE public.mahasiswa_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.mahasiswa_id_seq;
       public          postgres    false    212                       0    0    mahasiswa_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.mahasiswa_id_seq OWNED BY public.mahasiswa.id;
          public          postgres    false    211            �            1259    16528 
   peminjaman    TABLE     �   CREATE TABLE public.peminjaman (
    id integer NOT NULL,
    mahasiswa character varying(50) NOT NULL,
    jenis_sepeda character varying(50) NOT NULL,
    kode_sepeda character varying(5) NOT NULL,
    tanggal_meminjam date
);
    DROP TABLE public.peminjaman;
       public         heap    postgres    false            �            1259    16527    peminjaman_id_seq    SEQUENCE     �   CREATE SEQUENCE public.peminjaman_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.peminjaman_id_seq;
       public          postgres    false    216                       0    0    peminjaman_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.peminjaman_id_seq OWNED BY public.peminjaman.id;
          public          postgres    false    215            �            1259    16521    sepeda    TABLE     �   CREATE TABLE public.sepeda (
    id integer NOT NULL,
    sepeda character varying(50) NOT NULL,
    kode character varying(5) NOT NULL,
    tersedia integer,
    jumlah integer
);
    DROP TABLE public.sepeda;
       public         heap    postgres    false            �            1259    16520    sepeda_id_seq    SEQUENCE     �   CREATE SEQUENCE public.sepeda_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.sepeda_id_seq;
       public          postgres    false    214                       0    0    sepeda_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.sepeda_id_seq OWNED BY public.sepeda.id;
          public          postgres    false    213            p           2604    16466    admin id    DEFAULT     d   ALTER TABLE ONLY public.admin ALTER COLUMN id SET DEFAULT nextval('public.admin_id_seq'::regclass);
 7   ALTER TABLE public.admin ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    209    210    210            t           2604    16538 
   history id    DEFAULT     h   ALTER TABLE ONLY public.history ALTER COLUMN id SET DEFAULT nextval('public.history_id_seq'::regclass);
 9   ALTER TABLE public.history ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    217    218    218            q           2604    16482    mahasiswa id    DEFAULT     l   ALTER TABLE ONLY public.mahasiswa ALTER COLUMN id SET DEFAULT nextval('public.mahasiswa_id_seq'::regclass);
 ;   ALTER TABLE public.mahasiswa ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    211    212    212            s           2604    16531    peminjaman id    DEFAULT     n   ALTER TABLE ONLY public.peminjaman ALTER COLUMN id SET DEFAULT nextval('public.peminjaman_id_seq'::regclass);
 <   ALTER TABLE public.peminjaman ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    215    216    216            r           2604    16524 	   sepeda id    DEFAULT     f   ALTER TABLE ONLY public.sepeda ALTER COLUMN id SET DEFAULT nextval('public.sepeda_id_seq'::regclass);
 8   ALTER TABLE public.sepeda ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    213    214    214                      0    16463    admin 
   TABLE DATA           o   COPY public.admin (id, username, password, mahasiswa, gender, fakultas, departemen, alamat, image) FROM stdin;
    public          postgres    false    210   �*                 0    16535    history 
   TABLE DATA           t   COPY public.history (id, mahasiswa, jenis_sepeda, kode_sepeda, tanggal_meminjam, tanggal_mengembalikan) FROM stdin;
    public          postgres    false    218   +                 0    16479 	   mahasiswa 
   TABLE DATA           ]   COPY public.mahasiswa (id, nim, mahasiswa, gender, fakultas, departemen, alamat) FROM stdin;
    public          postgres    false    212   6+                 0    16528 
   peminjaman 
   TABLE DATA           `   COPY public.peminjaman (id, mahasiswa, jenis_sepeda, kode_sepeda, tanggal_meminjam) FROM stdin;
    public          postgres    false    216   �+                 0    16521    sepeda 
   TABLE DATA           D   COPY public.sepeda (id, sepeda, kode, tersedia, jumlah) FROM stdin;
    public          postgres    false    214   ,                  0    0    admin_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.admin_id_seq', 1, true);
          public          postgres    false    209                        0    0    history_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.history_id_seq', 1, false);
          public          postgres    false    217            !           0    0    mahasiswa_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.mahasiswa_id_seq', 5, true);
          public          postgres    false    211            "           0    0    peminjaman_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.peminjaman_id_seq', 4, true);
          public          postgres    false    215            #           0    0    sepeda_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.sepeda_id_seq', 2, true);
          public          postgres    false    213            v           2606    16470    admin admin_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.admin
    ADD CONSTRAINT admin_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.admin DROP CONSTRAINT admin_pkey;
       public            postgres    false    210            ~           2606    16540    history history_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.history
    ADD CONSTRAINT history_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.history DROP CONSTRAINT history_pkey;
       public            postgres    false    218            x           2606    16486    mahasiswa mahasiswa_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.mahasiswa
    ADD CONSTRAINT mahasiswa_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.mahasiswa DROP CONSTRAINT mahasiswa_pkey;
       public            postgres    false    212            |           2606    16533    peminjaman peminjaman_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.peminjaman
    ADD CONSTRAINT peminjaman_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.peminjaman DROP CONSTRAINT peminjaman_pkey;
       public            postgres    false    216            z           2606    16526    sepeda sepeda_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.sepeda
    ADD CONSTRAINT sepeda_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.sepeda DROP CONSTRAINT sepeda_pkey;
       public            postgres    false    214               ~   x�3�LL����T1�T14P	H4u�*..�(�N	1v�-q�IM��2H/.�7-J�*	��M�	v̨�LKp˯�tᓘ���$8�|=9=srK��sJKR�8���� ��e�s��qqq "�(�            x������ � �         �   x�����0��ۧ�/�i�aP���L\nR~Kk
���e3,g:�;��Sqp�C)u4bEɞ����j���c��	dz�x���O���vֱp%��ד���)CP6�Y�d�̣�\��?���oV�lHK��L�ICMF�_��+ON��k?��&�m�{Z�Y�            x������ � �         $   x�3�N-HMITp/�+�K�v�44 "�=... �K     