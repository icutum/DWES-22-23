def main():
    try:
        peso = int(input('Introduce tu peso (en kg): '))
        altura = float(input('Introduce tu altura (en metros): '))

        imc = peso / altura**2
        print(f"Tu IMC es {imc:.2f}")

    except ValueError:
        print("Prueba")

if __name__ == "__main__":
    main()